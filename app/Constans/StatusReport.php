<?php
    namespace App\Constans;
    
    class StatusReport{
        const WAITING_FOR_APPROVAL = 1;
        const APPROVED = 2;
        const REJECTED = 3;

        public static function toString(){
            return[
                self::WAITING_FOR_APPROVAL => "در انتظار تایید",
                self::APPROVED => "تایید شده",
                self::REJECTED => "رد شده",
            ];
        }
    }