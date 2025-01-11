<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Cars;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use App\Helpers\PersianHelper;
use Illuminate\Support\Facades\Validator;

use function Psl\Dict\flatten;

class CustomerController extends Controller
{  
    public function list(Request $request, Customer $customers){
        $customers = $customers->all();

        if(request()->has('search')){
            $search = $request->search;
            $customers = $this->search($search);
        }

        return view('admin.customers.list', compact('customers'));
    }

    public function show(string $name)
    {
        $customer = Customer::where('fullname', $name)->with('cars', 'bookings')->first();
        
        $registrationTime = Jalalian::fromCarbon(Carbon::parse($customer->created_at))->format('Y/m/d');
        
        foreach ($customer->bookings as $booking) {
            $booking->date = Jalalian::fromCarbon(Carbon::parse($booking->date))->format('Y/m/d');
        }

        foreach ($customer->cars as $car) {
            $car->license_plate = explode('-', $car->license_plate);
        }
        
        return view("admin.customers.show", compact('customer', 'registrationTime'));
    }  

    public function create(){
        return view("admin.customers.create");
    }

    public function store(Request $request){
        $date = PersianHelper::convertPersianToEnglish($request->date);

        $this->validate($request);

        $customer = Customer::create([
            "fullname"=>$request->fullname,
            "phone"=>$request->phone,
        ]);

        return redirect(route("customers.index"))->with("success","مشتری با موفقیت اضافه شد.");
    }

    public function destroy($id){
        $customer = Customer::find($id);
        $customer->delete();

        return redirect(route('customers.index'))->with("success","حذف مشتری با موفقیت انجام شد.");
    }

    public function update(Request $request,$id){
        $customer = Customer::find($id);

        $this->validate($request);

        $customer->update([
            "fullname"=>$request->fullname,
            "phone"=>$request->phone,
        ]);

        return redirect(route("customers.index"))->with("success","ویرایش با موفقیت انجام شد.");
    }

    public function validate($data){
        $data->validate([
            'fullname' =>  ['required', 'string', 'max:255'],
            'phone' => ['required', 'unique:customers'],
        ]);
    }

    public function search($search){
        $customers = Customer::where('fullname', 'like', '%' . $search . '%')
            ->orwhere('phone', 'like', '%' . $search . '%')
            ->get();
        
        return $customers;
    }

    // public function showPdf(){
    //     $car = Cars::first();

    //     $body = json_decode($car->body);
    //     $technical_check = json_decode($car->technical_check);
    //     $options = json_decode($car->options);
    //     $diag = json_decode($car->diag);
    //     $vip_services = json_decode($car->vip_services);

    //     $customer = Customer::find($car->customer_id);

    //     $date = PersianHelper::convertEnglishToPersian($customer->date);


    //     return view('pdf', compact('car', 'customer', 'technical_check', 'options', 'diag', 'vip_services', 'date', 'body'));
    // }

    // public function pdf($carId)
    // {
    //     $car = Cars::where('id', $carId)->first();
    //     $body = json_decode($car->body);
    //     $technical_check = json_decode($car->technical_check);
    //     $options = json_decode($car->options);
    //     $diag = json_decode($car->diag);
    //     $vip_services = json_decode($car->vip_services);

    //     $customer = Customer::find($car->customer_id);
        
    //     $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
    //     $fontDirs = $defaultConfig['fontDir'];
    
    //     $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
    //     $fontData = $defaultFontConfig['fontdata'];
        
    //     $mpdf = new Mpdf([
    //         'mode' => 'utf-8',
    //         'format' => 'A4',
    //         'default_font' => 'vazirmatn',
    //         'margin_left' => 15,
    //         'margin_right' => 15,
    //         'fontDir' => array_merge([
    //             public_path('fonts')
    //         ]),
    //         'fontdata' => [
    //             'vazirmatn' => [
    //                 'R' => 'Vazirmatn-Regular.ttf',
    //                 'useOTL' => 0xFF,
    //                 'useKashida' => 75,
    //             ]
    //         ],
    //     ]);        

    //     // اضافه کردن استایل‌های ضروری
    //     $customCSS = file_get_contents(public_path('css/pdf.css'));
    //     $mpdf->WriteHTML($customCSS, \Mpdf\HTMLParserMode::HEADER_CSS);
    
    //     $mpdf->SetDirectionality('rtl');

    //     $date = PersianHelper::convertEnglishToPersian($customer->date);
        
    //     $html = view('pdf', compact('car', 'customer', 'technical_check', 'options', 'diag', 'vip_services', 'date', 'body'))->render();
    //     $mpdf->WriteHTML($html);

    //     return [
    //         'pdf' => $mpdf->Output('car-report.pdf', 'D'),
    //         'message' => back()->with('success', 'PDF generated successfully!'),
    //     ];
    // }
}
