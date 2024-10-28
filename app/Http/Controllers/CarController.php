<?php

namespace App\Http\Controllers;

use App\Models\CarBody;
use App\Models\Cars;
use App\Models\Customer;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function store(Request $request){

        Cars::where('id', $request->id)->update([
            'data' => [
                'brand' => $request->carBrand,
                'model' => $request->carModel,
                'tip' => $request->carTip,
                'color' => $request->carColor,
                'body' => $request->carBody,
                'gearbox' => $request->carGearbox,
                'engine_volume' => $request->carEngineVolume,
                'fuel_type' => $request->carFuel,
                'year' => $request-> carYear,
                'function' => $request->carFunction,
                'vin_code' => $request->carVinCode,
                'bachelor_date' => $request->bachelorDate,
            ],
            'discreption' => $request->description,
            'body' => [
                'engine_door' => $request->engineDoor,
                'box_door' => $request->boxDoor,

                //Fenders
                'right_front_fender' => $request->rightFrontFender,
                'left_front_fender' => $request->leftFrontFender,
                'right_rear_fender' => $request->rightRearFender,
                'left_rear_fender' => $request->leftRearFender,

                //Doors
                'left_rear_door' => $request->leftRearDoor,
                'right_rear_door' => $request->rightRearDoor,
                'left_front_door' => $request->leftFrontDoor,
                'right_front_door' => $request->rightFrontDoor,
            ]
        ]);

        return back()->with("success", true);
    }
}
