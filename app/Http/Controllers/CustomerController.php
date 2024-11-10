<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Cars;
use App\Models\Customer;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Helpers\PersianHelper;
use Barryvdh\DomPDF\Facade\Pdf;

class CustomerController extends Controller
{
    
    public function show($carId){
        $car = Cars::find($carId);
        $body = json_decode($car->body);
        $technical_check = json_decode($car->technical_check);
        $options = json_decode($car->options);
        $pdfBody = json_decode($car->body, true);
        $diag = json_decode($car->diag);
        $vip_services = json_decode($car->vip_services);

        return view("customer.report", compact('body', 'pdfBody', 'car', 'technical_check', 'options', 'diag', 'vip_services'));
    }

    public function pdf(){
        $car = Cars::all()->first();
        $body = json_decode($car->body);
        $pdfBody = json_decode($car->body, true);
        $pdf = PDF::loadView('dashboard');
        return $pdf->stream('document.pdf');
    }

    public function form(){
        return view("customer.form");
    }
    
    public function store(Request $request, Customer $customer, Cars $cars){
        
        // $request->validate( [
        //     "name"=> 'required',
        //     "number"=> 'required',
        //     "car"=> 'required',
        //     "date"=> 'required',
        // ]);
        $date = PersianHelper::convertPersianToEnglish($request->date);

        $customer::create([
            "name"=> $request->name,
            "number"=>$request->number,
            "car"=>$request->car,
            "date"=> $date,
        ]);

        $cars->store( $cars ,$request, $customer );

        $lastCar = $cars->all()->last();

        $customer::latest()->first()->update([
            'car_id'=>$lastCar->id,
        ]);

        return back()->with("success",true);
    }
}
