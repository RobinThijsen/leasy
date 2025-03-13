<?php

namespace Leasy\Leasy\Enums;

enum ToastrPosition
{
    case TOP;
    case TOP_LEFT;
    case TOP_RIGHT;
    case BOTTOM;
    case BOTTOM_LEFT;
    case BOTTOM_RIGHT;

    public static function toString(ToastrPosition $position): string
    {
        return match ($position) {
            ToastrPosition::BOTTOM => 'bottom',
            ToastrPosition::BOTTOM_LEFT => 'bottom-left',
            ToastrPosition::BOTTOM_RIGHT => 'bottom-right',
            ToastrPosition::TOP => 'top',
            ToastrPosition::TOP_LEFT => 'top-left',
            default => 'top-right',
        };
    }

    public static function toPosition(string $position): ToastrPosition
    {
        return match (strtolower($position)) {
            'bottom' => ToastrPosition::BOTTOM,
            'bottom-left' => ToastrPosition::BOTTOM_LEFT,
            'bottom-right' => ToastrPosition::BOTTOM_RIGHT,
            'top' => ToastrPosition::TOP,
            'top-left' => ToastrPosition::TOP_LEFT,
            default => ToastrPosition::TOP_RIGHT,
        };
    }
}
