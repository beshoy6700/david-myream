<?php

namespace App\Http\Controllers;

use App\Services\CalendarService;

class CalendarController extends Controller
{
    public function __invoke(
        CalendarService $calendar
    ) {
        return redirect()->away(
            $calendar->url()
        );
    }
}
