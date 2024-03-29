<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenWeatherController;
use App\Http\Controllers\CalendarEventController;
use App\Http\Controllers\ValutaController;
use App\Http\Controllers\CountriesController;

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

Route::get('/date', function() {
    return redirect('/calendar');
});

Route::get('valuta', function () {
    return view('valuta');
});

Route::get('/general', function () {
    return redirect('earth');
});

Route::get('earth', function () {
    return view('earth');
});

Route::get('countries', function () {
    return view('countries');
});

// Weather CRUD routes
Route::post('getCurrentWeather', [OpenWeatherController::class, 'getCurrentWeather']);
Route::post('getCurrentWeatherPos', [OpenWeatherController::class, 'getCurrentWeatherPos']);
Route::post('getCurrentWeatherPlace', [OpenWeatherController::class, 'getCurrentWeatherPlace']);
Route::post('getForeCastWeather', [OpenWeatherController::class, 'getForeCastWeather']);

// Calendar Crud routes
Route::get('getCalendarEvents', [CalendarEventController::class, 'getItems']);
Route::post('createCalendarEvent', [CalendarEventController::class, 'createItem']);
Route::post('deleteCalendarEvent', [CalendarEventController::class, 'deleteItem']);
Route::post('updateCalendarEvent', [CalendarEventController::class, 'updateItem']);

// Valuta Crud routes
Route::get('loadJson', [ValutaController::class, 'loadJson']);

// Country Crud routes
Route::get('getCountries', [CountriesController::class, 'getItems']);
