<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalendarEvent;
use Carbon\Carbon;
use stdClass;

class CalendarEventController extends Controller
{
    public static function getItems() {
        return CalendarEvent::getItems();
    }

    public static function createItem(Request $request) {
        $calendarEvent = new stdClass();
        $calendarEvent->user_id = 1;
        $calendarEvent->title = $request->title;
        $calendarEvent->desc = $request->desc;
        $calendarEvent->start_date = $request->start_date;
        $calendarEvent->end_date = $request->end_date;
        $calendarEvent->reminder = $request->reminder == 'yes' ? true : false;
        $calendarEvent->alarm_time = new Carbon($request->start_date);
        return CalendarEvent::createItem($calendarEvent);
    }
}
