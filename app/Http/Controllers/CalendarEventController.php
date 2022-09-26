<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalendarEvent;
use Carbon\Carbon;
use stdClass;

class CalendarEventController extends Controller
{
    public function getItem($id) {

        return CalendarEvent::getItem($id);
    }
    public static function getItems() {
        return CalendarEvent::getItems();
    }

    public static function createItem(Request $request) {
        $calendarEvent = new stdClass();
        $calendarEvent->user_id = 1;
        $calendarEvent->title = $request->title;
        $calendarEvent->desc = $request->desc;
        $calendarEvent->start_date = $request->startDate;
        $calendarEvent->end_date = $request->endDate;
        $calendarEvent->reminder = $request->reminder == 'yes' ? true : false;
        $calendarEvent->alarm_time = new Carbon($request->startDate);
        return CalendarEvent::createItem($calendarEvent);
    }

    public static function deleteItem(Request $request) {
        if ($request->id) {
            
            return CalendarEvent::deleteItem($request->id);
        }
    }

    public static function updateItem(Request $request) {
        if ($request->id) {
            $oldEvent = getItems($request->id);
            
            if (!empty($request->title) && $oldEvent->title != $request->title) {
                CalendarEvent::updateItem('title', $request->title, $request->id);
            }

            CalendarEvent::updateItem($data);
        }
    }
}
