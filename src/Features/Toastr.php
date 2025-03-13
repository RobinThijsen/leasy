<?php

namespace Leasy\Leasy\Features;

use Illuminate\Support\Str;
use Leasy\Leasy\Enums\ToastrPosition;
use Leasy\Leasy\Enums\ToastrType;

class Toastr
{
    protected string $key;
    public bool $hasBeenRendered = false;
    public ToastrType $type;
    public ToastrPosition $position;
    public ?string $header;
    public string $content;
    public bool $isDismissable;
    public int|string $duration;

    public function __construct(string $content, ?string $header = null, ToastrType $type = ToastrType::DEFAULT, ToastrPosition $position = ToastrPosition::TOP_RIGHT, int|string $duration = 500, $isDismissable = false)
    {
        $this->key = Str::uuid()->toString();
        $this->duration = config('leasy.toastr.duration', $duration);

        $this->content = $content;
        $this->header = $header;
        $this->type = $type;
        $this->position = $position;
        $this->isDismissable = $isDismissable;
    }

    public static function fromSession($attributes)
    {
        return new self(
            content: $attributes['content'],
            header: $attributes['header'] ?? null,
            type: ToastrType::toType($attributes['type'] ?? ToastrType::DEFAULT),
            position: ToastrPosition::toPosition($attributes['position'] ?? ToastrPosition::TOP_RIGHT),
            duration: $attributes['duration'] ?? 500,
            isDismissable: $attributes['isDismissable'] ?? false,
        );
    }

    public function getKey(): string
    {
        return $this->key;
    }
}
