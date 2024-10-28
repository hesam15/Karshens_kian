<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function show(){
        return view("customer.form");
    }
    
    public function store(Request $request, Customer $customer, Cars $cars){
        
        // $request->validate( [
        //     "name"=> 'required',
        //     "number"=> 'required',
        //     "car"=> 'required',
        //     "date"=> 'required',
        // ]);

        $customer::create([
            "name"=> $request->name,
            "number"=>$request->number,
            "car"=>$request->car,
            "date"=>$request->date,
        ]);

        $cars->store( $cars ,$request, $customer );

        $lastCar = $cars->all()->last();

        $customer::latest()->update([
            'car_id'=>$lastCar->id,
        ]);

        return back()->with("success",true);
    }
}
