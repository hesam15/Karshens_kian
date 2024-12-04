<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\User;
use App\Models\Options;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Helpers\PersianHelper;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show(){
        $customers = User::all();
        $customers = User::paginate(8);
        $cars = Cars::all();
        

        return view("admin.customers", [
            "customers" => $customers, 
            'cars' => $cars,
            'persianDate' => function($date) {
                return PersianHelper::convertEnglishToPersian($date);
            }
        ]);
    }

    // public function persianDate($date){
    //     $date = PersianHelper::convertEnglishToPersian($date);

    //     return $date;
    // }

    public function report($carId){
        return view('admin.car.report', ['carId' => $carId]);
    }

    public function options(){

        return view('admin.options.createOption');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'sub_options' => 'required|array',
            'sub_values' => 'required|array',
        ]);

        $sub_options = $request->sub_options;
        $sub_values = $request->sub_values;
        
        $options_array = [];
        
        for($i = 0; $i < count($sub_options); $i++) {
            $values = explode('،', $sub_values[$i]);
            $options_array[$sub_options[$i]] = $values;
        }
        
        $option = new Options();
        $option->name = $request->name;
        $option->values = json_encode($options_array, JSON_UNESCAPED_UNICODE);
        $option->user_id = Auth::user()->id;
        $option->save();
    
        return redirect()->back()->with('success', true);
    }
}
