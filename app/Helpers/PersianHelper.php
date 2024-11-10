<?php

namespace App\Helpers;

use Morilog\Jalali\Jalalian;

class PersianHelper
{
    public static function convertPersianToEnglish($string) 
    {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        
        $toString = str_replace($persian, $english, $string);
        $toString = explode(" " ,$toString);

        $time = explode(":", $toString[1]);
        if ($time[1] > 0 && $time[1] < 30) {
            $time[1] = 0;
        }
        elseif ($time[1] > 30){
            $time[0] = 1;
        }

        $date = Jalalian::fromFormat('Y/m/d H:i', $toString)->toCarbon()->format('Y-m-d H:i');

        return $date;
    }
}
