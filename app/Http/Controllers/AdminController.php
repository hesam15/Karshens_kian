<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\User;
use App\Models\Options;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Helpers\PersianHelper;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show(){
        $customers = User::all();
        $customers = User::paginate(8);
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
