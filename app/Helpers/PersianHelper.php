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
        $toString = str_replace(self::$persian, self::$english, $string);
        $date = Jalalian::fromFormat('Y/m/d H:i', $toString)->toCarbon()->format('Y-m-d H:i');

        $toString = explode(" " ,$toString);

        $time = explode(":", $toString[1]);
        if ($time[1] > 0 && $time[1] < 30) {
            $time[1] = 0;
        }
        elseif ($time[1] > 30){
            $time[0] = 1;
        }


        return $date;
    }

    public static function convertEnglishToPersian($string){
        $parts = explode(" ", $string);
        
        $date = trim($parts[0]);
        $time = trim($parts[1]);
        
        $dateTime = $date . ' ' . $time;
        
        // Make sure there's no trailing data by using trim()
        $dateTime = trim($dateTime);
        
        $date = Jalalian::fromCarbon(Carbon::parse($dateTime))->format('Y/m/d H:i');

        $toString = str_replace(self::$english, self::$persian, $date);

        $date = explode(" ", $toString);

        return $date;
    }

    public function persianDate($date){
        if (!$date) {
            return '';
        }
        return PersianHelper::convertEnglishToPersian($date);
    }    
}
