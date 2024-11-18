<?php

namespace App\Jobs;

use Log;
use Mpdf\Mpdf;
use App\Models\Cars;
use App\Models\Customer;
use Illuminate\Bus\Queueable;
use App\Helpers\PersianHelper;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateCarPdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $car;

    public function __construct($car)
    {
        $this->car = $car;
    }

    public function handle()
    {
        $car = Cars::first();
        $carAttr = $car->getDecodedAttributes();

        $body = $carAttr["body"];
        $technical_check = $carAttr["technical_check"];
        $options = $carAttr["options"];
        $diag = $carAttr["diag"];
        $vip_services = $carAttr["vip_services"];
        
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

        $customCSS = file_get_contents(public_path('css/pdf.css'));
        $mpdf->WriteHTML($customCSS, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->SetDirectionality('rtl');

        $date = PersianHelper::convertEnglishToPersian($customer->date);
        $html = view('pdf', compact('car', 'customer', 'technical_check', 'options', 'diag', 'vip_services', 'date', 'body'))->render();
        $mpdf->WriteHTML($html);

        $path = public_path('pdfs/car-'.$car->id.'.pdf');
        try {
            $mpdf->Output($path, 'F');
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('PDF Generation failed: ' . $e->getMessage());
        }
    }
}
