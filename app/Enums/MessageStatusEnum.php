<?php

namespace App\Enums;

enum MessageStatusEnum: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'في الانتظار',
            self::APPROVED => 'معتمد',
            self::REJECTED => 'مرفوض',
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