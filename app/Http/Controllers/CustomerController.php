<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Cars;
use App\Models\Customer;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Helpers\PersianHelper;
use Mpdf\Mpdf;

class CustomerController extends Controller
{
    
    public function show($carId){
        $car = Cars::find($carId);
        $data = $car->attrs();

        $customer = Customer::find($car->customer_id);

        $date = PersianHelper::convertEnglishToPersian($customer->date);

        return view("customer.report", [
            'car' => $car,
            'customer' => $customer,
            'body' => $data['body'],
            'technical_check' => $data['technical_check'],
            'options' => $data['options'],
            'diag' => $data['diag'],
            'vip_services' => $data['vip_services'],
            'date' => $date,
        ]);
    }

    public function pdf($carId)
    {
        $car = Cars::where('id', $carId)->first();
        $body = json_decode($car->body);
        $technical_check = json_decode($car->technical_check);
        $options = json_decode($car->options);
        $diag = json_decode($car->diag);
        $vip_services = json_decode($car->vip_services);

        $customer = Customer::find($car->customer_id);
        
        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];
    
        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        
        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'default_font' => 'vazirmatn',
            'margin_left' => 15,
            'margin_right' => 15,
            'fontDir' => array_merge([
                public_path('fonts')
            ]),
            'fontdata' => [
                'vazirmatn' => [
                    'R' => 'Vazirmatn-Regular.ttf',
                    'useOTL' => 0xFF,
                    'useKashida' => 75,
                ]
            ],
        ]);        

        // اضافه کردن استایل‌های ضروری
        $customCSS = file_get_contents(public_path('css/pdf.css'));
        $mpdf->WriteHTML($customCSS, \Mpdf\HTMLParserMode::HEADER_CSS);
    
        $mpdf->SetDirectionality('rtl');

        $date = PersianHelper::convertEnglishToPersian($customer->date);
        
        $html = view('pdf', compact('car', 'customer', 'technical_check', 'options', 'diag', 'vip_services', 'date', 'body'))->render();
        $mpdf->WriteHTML($html);

        return [
            'pdf' => $mpdf->Output('car-report.pdf', 'D'),
            'message' => back()->with('success', 'PDF generated successfully!'),
        ];
    }
    
    public function showPdf(){
        $car = Cars::first();

        $body = json_decode($car->body);
        $technical_check = json_decode($car->technical_check);
        $options = json_decode($car->options);
        $diag = json_decode($car->diag);
        $vip_services = json_decode($car->vip_services);

        $customer = Customer::find($car->customer_id);

        $date = PersianHelper::convertEnglishToPersian($customer->date);


        return view('pdf', compact('car', 'customer', 'technical_check', 'options', 'diag', 'vip_services', 'date', 'body'));
    }
    

    public function form(){
        return view("customer.form");
    }
    
    public function store(Request $request, Customer $customer, Cars $cars){
        
        $request->validate( [
            "name"=> 'required',
            "mobile"=> 'required|unique:customers',
            "car"=> 'required',
            "date"=> 'required',
        ]);
        $date = PersianHelper::convertPersianToEnglish($request->date);

        $customer::create([
            "name"=> $request->name,
            "mobile"=>$request->mobile,
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
