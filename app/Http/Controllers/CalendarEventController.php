<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalendarEvent;

class CalendarEventController extends Controller
{
    public static function getItems() {
        return CalendarEvent::getItems();
    }

    public static function createItem(Request $request) {
       return CalendarEvent::createItem($request);
    }
}
