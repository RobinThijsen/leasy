<?php

namespace Leasy\Leasy\Facades;

use Illuminate\Support\Facades\Facade;
use Leasy\Leasy\Enums\ToastrPosition;
use Leasy\Leasy\Enums\ToastrType;

/**
 * @method static void toast($content, $header = null, ToastrType $type = ToastrType::DEFAULT, ToastrPosition $position = ToastrPosition::TOP_RIGHT, bool $closable = false);
 * @method static \Leasy\Leasy\Features\Modal modal(string $name);
 *
 * @see \Leasy\Leasy\Leasy
 */
class Leasy extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Leasy\Leasy\Leasy::class;
    }
}
