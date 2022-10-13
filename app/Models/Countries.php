<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;

    public static function getItems($path) {
        /* $newFile = json_decode(file_get_contents($path));
        foreach ($newFile as $n) {
            unset($n->translations);
        }
        $f = fopen(storage_path() . "/json/countries2.json", "w");
        fwrite($f, json_encode($newFile));
        fclose($f);
        return $newFile;
        */
        return file_get_contents($path);
    }
}
