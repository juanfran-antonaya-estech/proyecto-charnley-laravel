<?php

namespace App\Http\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Number;
use Illuminate\Support\Str;

class NumberHelper{

    public function padstart($number, $padzeros = 2){
        $numberstring = "" . $number;
        $cifras = Str::length($numberstring);
        $cifrastring = $numberstring;
        if($cifras < $padzeros){

            for ($i=$cifras; $i < $padzeros ; $i++) {

                $cifrastring ="0" . $cifrastring;
            }
        }
        return $cifrastring;
    }

    public function dateformat($date){
        Carbon::now();
    }
}
