<?php

namespace App\Http\Controllers;

use App\Models\CarBody;
use App\Models\Cars;
use App\Models\Customer;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function store(Request $request){
        

        return back()->with("success", true);
    }
}
