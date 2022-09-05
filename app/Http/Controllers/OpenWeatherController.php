<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpenWeather;

class OpenWeatherController extends Controller
{
    public static function getCurrentWeather() {
        return OpenWeather::getCurrentWeather();
    }

    public static function getCurrentWeatherPos(Request $request) {
        $lon = $request->longitude;
        $lat = $request->latitude;
        return OpenWeather::getCurrentWeatherPos($lon, $lat);
    }

    public static function getCurrentWeatherPlace(Request $request) {
        $place = $request->place;
        return OpenWeather::getCurrentWeatherPlace($place);
    }
}
