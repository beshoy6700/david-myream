<?php

namespace App\Enums;

enum RSVPStatusEnum: string
{
    case PENDING = 'pending';
    case ATTENDING = 'attending';
    case NOT_ATTENDING = 'not_attending';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'في الانتظار',
            self::ATTENDING => 'سيحضر',
            self::NOT_ATTENDING => 'لن يحضر',
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