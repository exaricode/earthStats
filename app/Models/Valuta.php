<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Valuta extends Model
{
    use HasFactory;

    public static function loadJson($path){
        return file_get_contents($path);
    }
}
