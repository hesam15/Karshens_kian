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
    public function create($customerId){
        $customer = Customer::find($customerId);

        return view('admin.bookings.create', compact('customer'));
    }

    public function store(Request $request, $customerId){
        $customer = Customer::find($customerId);

        $date = PersianHelper::convertPersianToEnglish($request->date);

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

        Cars::create([
            "customer_id"=>$customer->id,
            "name"=>$request->car_type,
        ]);

        return back()->with("success","رزرو با موفقیت انجام شد.");
    }
}
