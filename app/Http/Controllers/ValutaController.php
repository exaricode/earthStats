<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Valuta;

class ValutaController extends Controller
{
    public static function loadJson(){
        $filename = "countries_and_currencies";

        $path = storage_path() . "/json/${filename}.json";
        if (file_exists($path)) {
            return Valuta::loadJson($path);
        }
    }
}
