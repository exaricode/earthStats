<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenWeather extends Model
{
    use HasFactory;
    
    private $api_key = NULL;
    private $api_endpoint_current = NULL;
    private $api_endpoint_forecast = NULL;
    private $api_endpoint_onecall = NULL;
    private $api_endpoint_history = NULL;
    private $api_endpoint_icons = NULL;
    private $api_endpoint_icons_ext = NULL;
    private $api_lang = NULL;
    private $format_date = NULL;
    private $format_time = NULL;
    private $format_day = NULL;
    private $url = null;
    

    public function __construct() {
        $this->api_key = config('openweather.api_key');
        $this->api_endpoint_current = config('openweather.api_endpoint_current');
        $this->api_endpoint_forecast = config('openweather.api_endpoint_forecast');
        $this->api_endpoint_onecall = config('openweather.api_endpoint_onecall');
        $this->api_endpoint_history = config('openweather.api_endpoint_history');
        $this->api_endpoint_icons = config('openweather.api_endpoint_icons');
        $this->api_endpoint_icons_ext = config('openweather.api_endpoint_icons_ext');
        $this->api_lang = config('openweather.api_lang');
        $this->format_date = config('openweather.format_date');
        $this->format_time = config('openweather.format_time');
        $this->format_day = config('openweather.format_day');
        $this->url = 'http://api.openweathermap.org/data/2.5/forecast?id=524901&appid=';

    }

    public static function getCurrentWeather() {
        $weather = new OpenWeather();
        return @file_get_contents($weather->api_endpoint_current . 'q=Amsterdam&appid=' . $weather->api_key . '&units=metric');
    }
}
