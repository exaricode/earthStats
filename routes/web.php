<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenWeatherController;
use App\Models\OpenWeather;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/' , function() {
    return redirect('/home');
});

Route::get('/home', function () {
    return view('index');
});

Route::get('time', function () {
    return redirect('/worldclock');
});

Route::get('/worldclock', function () {
    return view('clock');
});

Route::get('weather', function () {
    return view('weather');
});

Route::get('/local', function () {
    return redirect('/weather');
});

Route::get('calendar', function () {
    return view('calendar');
});

Route::post('getCurrentWeather', [OpenWeatherController::class, 'getCurrentWeather']);
Route::post('getCurrentWeatherPos', [OpenWeatherController::class, 'getCurrentWeatherPos']);
Route::post('getCurrentWeatherPlace', [OpenWeatherController::class, 'getCurrentWeatherPlace']);
Route::post('getForeCastWeather', [OpenWeatherController::class, 'getForeCastWeather']);
