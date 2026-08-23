<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeddingSetting extends Model
{
    protected $fillable = [
        'groom_name',
        'bride_name',

        'wedding_date',
        'cover_image',

        'locale',

        'church_name_ar',
        'church_name_en',

        'church_address_ar',
        'church_address_en',

        'church_maps_url',

        'reception_name_ar',
        'reception_name_en',

        'reception_address_ar',
        'reception_address_en',

        'reception_maps_url',

        'max_attendees_limit',

        'enable_memory_sky',
        'enable_ai_replies',

        'welcome_message_ar',
        'welcome_message_en',
    ];

    protected $casts = [
        'wedding_date' => 'datetime',

        'enable_memory_sky' => 'boolean',

        'enable_ai_replies' => 'boolean',
    ];

    public function getWeddingDateTimeFormattedAttribute(): string
    {
        return app()->getLocale() === 'ar'
            ? $this->wedding_date
            ->locale('ar')
            ->translatedFormat('l d F Y - h:i A')
            : $this->wedding_date
            ->locale('en')
            ->translatedFormat('l d F Y - h:i A');
    }

    public function getWeddingDateFormattedAttribute(): string
    {
        return app()->getLocale() === 'ar'
            ? $this->wedding_date->locale('ar')->translatedFormat('l d F Y')
            : $this->wedding_date->format('d F Y');
    }
}