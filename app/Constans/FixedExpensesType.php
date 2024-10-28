<?php
namespace App\Constans;

class FixedExpensesType{
    const WEEKLY_EXPENSES = 1;
    const MONTHLY_EXPENSES = 2;
    const DAYLY_EXPENSES = 3;

    public static function toString(){
        return[
            self::WEEKLY_EXPENSES => "خرج های هفتگی",
            self::MONTHLY_EXPENSES => "خرج های ماهانه",
            self::DAYLY_EXPENSES => 'خرج های روزانه'
        ] ;
    }
}