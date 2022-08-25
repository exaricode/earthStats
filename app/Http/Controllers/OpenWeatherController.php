<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpenWeather;

class OpenWeatherController extends Controller
{
    public static function getCurrentWeather() {
        return OpenWeather::getCurrentWeather();
    }
}
