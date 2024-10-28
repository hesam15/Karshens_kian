<?php
namespace App\Constans;

class Status{
    const NOT_PAID = 0;
    const PAID = 1;

    public static function toString(){
        return[
            self::NOT_PAID => 'پرداخت نشده',
            self::PAID => 'پرداخت شده'
        ];
    }
}