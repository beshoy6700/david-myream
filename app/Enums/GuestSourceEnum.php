<?php

namespace App\Enums;

enum GuestSourceEnum: string
{
    case David = 'David';
    case BRIDE = 'Myream';
    case SISTER = 'SISTER';
    case BRIDE_SISTER = 'bride_sister';
    case PUBLIC = 'public';

    public function label(): string
    {
        return match ($this) {
            self::David => 'ديفيد',
            self::BRIDE => 'مريام',
            self::SISTER => 'أخت العريس',
            self::BRIDE_SISTER => 'أخت العروس',
            self::PUBLIC => 'دعوة عامة',
        };
    }

    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn(self $case) => [
                $case->value => $case->label(),
            ])
            ->toArray();
    }
}
