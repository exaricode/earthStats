<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Countries;

class CountriesController extends Controller
{
    public static function getItems() {
        // Copy from https://restcountries.com/#api-endpoints-v3-all
        $filename = 'countries';
        $path = storage_path() . "/json/${filename}.json";

        if (file_exists($path)){
            return Countries::getItems($path);
        }
    }
}
