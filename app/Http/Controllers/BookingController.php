<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cars;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Helpers\PersianHelper;
use Hekmatinasser\Jalali\Jalali;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function list($name){
        $customer = Customer::where('fullname', $name)->first();
        $bookings = Booking::with('car')->where('customer_id', $customer->id)->orderBy('date', 'asc')->orderByRaw("CAST(time_slot AS TIME)")->get();
            
        foreach($bookings as $booking){
            $booking->date = Jalalian::fromCarbon(Carbon::parse($booking->date))->format('Y/m/d');
        }

        foreach ($customer->cars as $car) {
            $car->license_plate = explode('-', $car->license_plate);
        }

        return view('admin.customers.bookings', compact('bookings', 'customer'));
    }

    public function create($name){
        $customer = Customer::where("fullname", $name)->first();

        foreach($customer->bookings as $booking){
            $booking->date = Jalalian::fromCarbon(Carbon::parse($booking->date))->format('Y/m/d');
        }

        return view('admin.bookings.create', compact('customer'));
    }

    public function store(Request $request, $name){
        $customer = Customer::where("fullname", $name)->first();

        $date = PersianHelper::convertPersianToEnglish($request->date);

        $date = Jalalian::fromFormat('Y/m/d', $date)->toCarbon();

        if(Booking::isTimeSlotAvailable($date, $request->time_slot)){
            return back()->with("error","این زمان قبلا رزرو شده است.");
        }

        $request->validate([
            "car"=>"required",
            "date"=>"required",
            "time_slot"=>"required",
        ]);

        $customer->bookings()->create([
            "date"=>$date->format('Y-m-d'),
            "time_slot"=>$request->time_slot,
            "customer_id"=>$customer->id,
            "car_id"=>$request->car,
        ]);

        return back()->with("success","رزرو با موفقیت انجام شد.");
    }

    public function destroy($id){
        $booking = Booking::find($id);
        $booking->delete();

        return back()->with("success","حذف با موفقیت انجام شد.");
    }

    public function update(Request $request, $id){
        $booking = Booking::find($id);
        $date = PersianHelper::convertPersianToEnglish($request->date);

        $booking->update([
            'car_id'=>$request->car_id,
            "date"=>$date,
            "time_slot"=>$request->time_slot,
            'status'=>$request->status,
        ]);

        return back()->with("success","ویرایش با موفقیت انجام شد.");
    }
}

