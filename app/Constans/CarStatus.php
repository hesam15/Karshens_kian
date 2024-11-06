<?php
    namespace App\Constans;

    class CarStatus{
        const BROKE = 0;
        const RIGHT = 1;

        public static function toString(){
            return[
                self::BROKE => "ناسالم",
                self::RIGHT => "سالم",
            ];
        }
    }