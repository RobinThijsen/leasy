<?php

namespace Leasy\Leasy\Enums;

enum ToastrType
{
    case DEFAULT;
    case SUCCESS;
    case WARNING;
    case INFO;
    case ERROR;

    public static function toString(ToastrType $type): string
    {
        return match ($type) {
            ToastrType::SUCCESS => 'success',
            ToastrType::WARNING => 'warning',
            ToastrType::INFO => 'info',
            ToastrType::ERROR => 'error',
            default => 'default',
        };
    }

    public static function toType(string $type): ToastrType
    {
        return match (strtolower($type)) {
            'success' => ToastrType::SUCCESS,
            'warning' => ToastrType::WARNING,
            'info' => ToastrType::INFO,
            'error' => ToastrType::ERROR,
            default => ToastrType::DEFAULT,
        };
    }
}
