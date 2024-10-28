<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show(){
        $customers = Customer::all();

        return view("admin.customers", compact("customers"));
    }

    public function report(){
        $user = Customer::all()->last();

        return view('admin.car.report', compact("user"));
    }
}
