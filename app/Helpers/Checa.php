<?php 

namespace App\Helpers;

class Checa {

    public static function middleware($prefix)
    {
        return in_array($prefix, request()->route()->middleware());
    }
}