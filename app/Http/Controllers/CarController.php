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
}
