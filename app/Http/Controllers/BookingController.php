<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Helpers\PersianHelper;
use App\Models\Booking;
use App\Models\Cars;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function create($id){
        $customer = Customer::find($id);

        return view('admin.bookings.create', compact('customer'));
    }

    public function store(Request $request, $id){
        $customer = Customer::find($id);

        $date = PersianHelper::convertPersianToEnglish($request->date);

        $customerCars =  Cars::where("customer_id", $customer->id)->pluck("name")->toArray();

        $license_plate = 
        $request->plate_two .  '-' .
        $request->plate_letter . '-' . 
        $request->plate_three . '-' .
        $request->plate_iran;

        $request->validate([
            "time_slot"=>"required",
            "car_type"=>"required",
        ]);

        if(Booking::isTimeSlotAvailable($date, $request->time_slot)){
            return back()->with("error","این زمان قبلا رزرو شده است.");
        }

        $customer->bookings()->create([
            "date"=>$date,
            "time_slot"=>$request->time_slot,
            "car_type"=>$request->car_type,
        ]);

        if(!in_array($request->car_type, $customerCars)){
            Cars::create([
                "customer_id"=>$customer->id,
                "name"=>$request->car_type,
                'color'=>$request->color,
                'license_plate'=>$license_plate,
            ]);
        }

        return back()->with("success","رزرو با موفقیت انجام شد.");
    }
}

