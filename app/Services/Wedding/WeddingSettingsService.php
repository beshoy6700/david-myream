<?php

namespace App\Services\Wedding;

use App\Models\Setting;
use Carbon\Carbon;

class WeddingSettingsService
{
    public static function groomName(): string
    {
        return Setting::get(
            'groom_name',
            'David'
        );
    }

    public static function brideName(): string
    {
        return Setting::get(
            'bride_name',
            'Myream'
        );
    }

    public static function weddingDate(): Carbon
    {
        return Carbon::parse(
            Setting::get(
                'wedding_date',
                '2026-08-30 17:30:00'
            )
        );
    }

    public static function churchName(): string
    {
        return Setting::get(
            'church_name_ar'
        );
    }

    public static function churchMapUrl(): ?string
    {
        return Setting::get(
            'church_maps_url'
        );
    }

    public static function receptionName(): ?string
    {
        return Setting::get(
            'reception_name_ar'
        );
    }

    public static function receptionMapUrl(): ?string
    {
        return Setting::get(
            'reception_maps_url'
        );
    }
}
