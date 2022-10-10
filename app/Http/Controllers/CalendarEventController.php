<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CalendarEvent;
use Carbon\Carbon;
use stdClass;

class CalendarEventController extends Controller
{
    public static function getItem($id) {

        return CalendarEvent::getItem($id)->first();
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
        $calendarEvent->alarm_time = $request->reminder == 'yes' ? $request->alarm_time : 0;
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
            $oldEvent = CalendarEventController::getItem($request->id);
            
            Validator::make($request->all(), [
                'user_id' => ['required'],
                'title'=> ['required', 'max:255'],
                'desc' => ['nullable'],
                'start_date' => ['required', 'date'],
                'end_date' => ['nullable', 'date'],
                'reminder' => [''],
                'alarm' => ['nullable', 'integer']
            ])->validate();


            return CalendarEventController::getItem($request->id);
        }
    }
}
