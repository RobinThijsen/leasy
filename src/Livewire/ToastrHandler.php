<?php

namespace Leasy\Leasy\Livewire;

use Illuminate\Support\Str;
use Leasy\Leasy\Enums\ToastrPosition;
use Leasy\Leasy\Enums\ToastrType;
use Leasy\Leasy\Features\Toastr;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use Leasy\Leasy\Livewire\LeasyComponent as Component;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class ToastrHandler extends Component
{
    #[Locked]
    public string $key;

    #[Session]
    public bool $hasBeenRendered = false;

    public ToastrType $type = ToastrType::DEFAULT;
    public ToastrPosition $position = ToastrPosition::TOP_RIGHT;
    public ?string $header = null;
    public string $content = "";

    public ?Toastr $toastr;

    public function mount()
    {
        if (session()->has('toastr')) {
            $session = session('toastr');
            $this->toastr = Toastr::fromSession($session);
        }

        if (!empty($this->toastr)) {
            if ($this->hasBeenRendered) {
                $this->dispatch('toastr.regenerate');
            }
            else {
                $this->dispatch('toastr.generate');
            }
        }
    }

    #[On('toastr.init')]
    public function toast(string $content, ?string $header, string $type, string $position, int|string $duration, bool $isDismissable): void
    {
        $this->toastr = new Toastr(
            content: $content,
            header: $header,
            type: ToastrType::toType($type),
            position: ToastrPosition::toPosition($position),
            duration: $duration,
            isDismissable: $isDismissable,
        );

        if ($this->hasBeenRendered) {
            $this->dispatch('toastr.regenerate');
        }
        else {
            $this->dispatch('toastr.generate');
        }
    }

    public function getType(): string
    {
        return ToastrType::toString($this->type);
    }

    public function getPosition(): string
    {
        return ToastrPosition::toString($this->position);
    }

    public function hasIcon(): bool
    {
        return $this->getIcon() !== null;
    }

    public function getIcon(): string
    {
        return match ($this->type) {
            ToastrType::SUCCESS => 'check-circle',
            ToastrType::ERROR => 'exclamation-circle',
            ToastrType::WARNING => 'exclamation-triangle',
            ToastrType::INFO => 'info-circle',
            default => null,
        };
    }

    public function dismiss(): void
    {
        if ($this->isDismissable) {
            $this->dispatch('toastr.dismiss');
        }
    }

    public function render()
    {
        return view('leasy::livewire.toastr');
    }
}
