<?php

namespace App\Enums;

enum GuestTitleEnum: string
{
    case MR = 'أ.';
    case ENGINEER = 'م.';
    case DOCTOR = 'د.';

    public function label(): string
    {
        return $this->value;
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
