<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show(){
        $customers = Customer::all();
        $cars = Cars::all();

        return view("admin.customers", compact("customers", 'cars'));
    }

    public function report($carId){
        return view('admin.car.report', ['carId' => $carId]);
    }
}
