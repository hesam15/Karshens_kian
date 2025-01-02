<?php

namespace App\Helpers;

use Carbon\Carbon;
use Morilog\Jalali\Jalalian;

class PersianHelper
{

    private static $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    private static $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    public static function convertPersianToEnglish($string) 
    {      
        $date = str_replace(self::$persian, self::$english, $string);

        return $date;
    }

    public static function convertEnglishToPersian($string){
        if(!$string){
            return "";
        }
        $date = str_replace(self::$english, self::$persian, $string);

        return $date;
    }

    public function persianDate($date){
        if (!$date) {
            return '';
        }
        return PersianHelper::convertEnglishToPersian($date);
    }    
}
