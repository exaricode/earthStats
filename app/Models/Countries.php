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
            unset($n->tld);
            unset($n->cca2);
            unset($n->ccn3);
            unset($n->cca3);
            unset($n->cioc);
            unset($n->idd);
            unset($n->altSpellings);
            unset($n->latlng);
            unset($n->demonyns);
            unset($n->maps);
            unset($n->gini);
            unset($n->fifa);
            unset($n->startOfWeek);
            unset($n->capitalInfo);
            unset($n->postalCode);
        }
        $f = fopen(storage_path() . "/json/countries.json", "w");
        fwrite($f, json_encode($newFile));
        fclose($f);
        return $newFile; */
       
        return file_get_contents($path);
    }
}
