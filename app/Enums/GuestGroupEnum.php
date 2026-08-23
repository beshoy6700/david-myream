<?php

namespace App\Enums;

enum GuestGroupEnum: string
{
    case FAMILY = 'family';
    case FRIENDS = 'friends';
    case WORK = 'work';
    case CHURCH = 'church';
    case PUBLIC = 'public';

    public function label(): string
    {
        return match ($this) {
            self::FAMILY => 'العائلة',
            self::FRIENDS => 'الأصدقاء',
            self::WORK => 'العمل',
            self::CHURCH => 'الكنيسة',
            self::PUBLIC => 'عام',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn(self $case) => [
                $case->value => $case->label()
            ])
            ->toArray();
    }
}