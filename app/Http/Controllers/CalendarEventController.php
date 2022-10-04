<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalendarEvent;
use Carbon\Carbon;
use stdClass;

class CalendarEventController extends Controller
{
    public static function getItem($id) {

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

    /* id | user_id | title | desc | start_date | 
     *   end_date | alarm_time | reminder
     */
    public static function updateItem(Request $request) {
        if ($request->id) {
            $oldEvent = CalendarEventController::getItem($request->id)[0];
            
            Validator::make($request->all(), [
                'user_id' => ['required'],
                'title'=> ['required', 'max:255'],
                'desc' => ['nullable'],
                'start_date' => ['required', 'date'],
                'end_date' => ['nullable', 'date'],
                'reminder' => [''],
                'alarm' => ['nullable']
            ])->validate();


            // CalendarEvent::updateItem($data);
        }
    }
}
