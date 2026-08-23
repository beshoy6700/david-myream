<?php

namespace App\Services;

use App\Models\WeddingSetting;

class CalendarService
{
    public function url(): string
    {
        $settings = WeddingSetting::firstOrFail();

        $start = $settings->wedding_date
            ->clone()
            ->utc()
            ->format('Ymd\THis\Z');

        $end = $settings->wedding_date
            ->clone()
            ->addHours(2)
            ->utc()
            ->format('Ymd\THis\Z');

        $params = [

            'action' => 'TEMPLATE',

            'text' => '💒 David & Myream Wedding',

            'dates' => "{$start}/{$end}",

            'location' => $settings->church_name_ar,

            'details' => implode("\n", [

                'نتشرف بحضوركم ومشاركتكم فرحتنا ❤️',

                '',

                '⛪ ' . $settings->church_name_ar,

                '',

                '📍 ' . $settings->church_maps_url,

            ]),
        ];

        return 'https://calendar.google.com/calendar/render?'
            . http_build_query($params);
    }
}
