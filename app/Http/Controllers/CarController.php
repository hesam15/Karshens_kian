<?php

namespace App\Http\Controllers;

use App\Models\CarBody;
use App\Models\Cars;
use App\Models\Customer;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function create($name){
        $customer = Customer::where('fullname', $name)->first();

        return view('admin.car.create', compact('customer'));
    }
    public function store(Request $request){
        $customer = Customer::find($request->customer_id);
        $customerCars =  Cars::where("customer_id", $request->customer_id)->pluck("license_plate")->toArray();

        // $request->validate([
        //     'name' => 'required',
        //     'color' => 'required',
        //     'plate_two' => 'required',
        //     'plate_letter' => 'required',
        //     'plate_three' => 'required',
        //     'plate_iran' => 'required',
        // ]);
        
        $license_plate = 
            $request->plate_two .  '-' .
            $request->plate_letter . '-' . 
            $request->plate_three . '-' .
            $request->plate_iran;
        
        if(!in_array($license_plate, $customerCars)){
            $customer->cars()->create([
                "customer_id"=>$customer->id,
                "name"=>$request->name,
                'color'=>$request->color,
                'license_plate'=>$license_plate,
            ]);
            
            return redirect(route("bookings.create" , $customer->fullname))->with("success", "ثبت خودرو با موفقیت انجام شد.");
        }

        return back()->with("error", "این خودرو قبلا ثبت شده است.");
    }

    public function update(Request $request, $id){
        $car = Cars::find($id);

        $license_plate = 
        $request->plate_two .  '-' .
        $request->plate_letter . '-' . 
        $request->plate_three . '-' .
        $request->plate_iran;

        $car->update([
            'name' => $request->name,
            'color' => $request->color,
            'license_plate' => $license_plate,
        ]);

        return back()->with("success", "ویرایش خودرو با موفقیت انجام شد.");
    }

    public function destroy($id){
        $car = Cars::find($id);
        $car->delete();

        return back()->with("success", "حذف خودرو با موفقیت انجام شد.");
    }
}
