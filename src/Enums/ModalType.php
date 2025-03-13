<?php

namespace Leasy\Leasy\Enums;

enum ModalType
{
    case FLYOUT;
    case DEFAULT;

    public static function toString(ModalType $type): string
    {
        return match ($type) {
            ModalType::FLYOUT => 'flyout',
            default => 'default',
        };
    }

    public static function toType(string $type): ModalType
    {
        return match (strtolower($type)) {
            'flyout' => ModalType::FLYOUT,
            default => ModalType::DEFAULT,
        };
    }
}
