<?php

namespace App\Http\Controllers;

use App\Helpers\PersianHelper;
use App\Models\Cars;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show(){
        $customers = Customer::all();
        $customers = Customer::paginate(8);
        $cars = Cars::all();
        

        return view("admin.customers", [
            "customers" => $customers, 
            'cars' => $cars,
            'persianDate' => function($date) {
                return PersianHelper::convertEnglishToPersian($date);
            }
        ]);
    }

    // public function persianDate($date){
    //     $date = PersianHelper::convertEnglishToPersian($date);

    //     return $date;
    // }

    public function report($carId){
        return view('admin.car.report', ['carId' => $carId]);
    }
}
