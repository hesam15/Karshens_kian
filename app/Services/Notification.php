<?php
namespace App\Services;

use App\Models\User;
use Kavenegar\KavenegarApi;
use Kavenegar\Laravel\Channel\KavenegarChannel;
use Kavenegar\Laravel\Message\KavenegarMessage;
use Kavenegar\Laravel\Notification\KavenegarBaseNotification;
use SoapClient;

class Notification {
    protected $client;

    public function __construct()
    {
        $this->client = new SoapClient(config('services.sms.uri'), [
            'trace' => true,
            'exceptions' => true,
            'encoding' => 'UTF-8',
            'cache_wsdl' => WSDL_CACHE_NONE
        ]);
    }

    // public function sendSMS($phone)
    // {
    //     $user = config("services.sms.auth.user");
    //     $pass = config("services.sms.auth.pass");
    //     $fromNum = config("services.sms.auth.fromNum");
    //     $toNum = $phone;
    //     $pattern_code = "6nvuf9krddxh8cj";
    //     $input_data = array(
    //         'name' => "حسام الدین زراعتکار",
    //         'car' => 'بنز',
    //         'company' => 'شرکت پیشرو',
    //     );

    //     echo $this->client->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
    // }

    public function sendSMSVerify($phone, $code){
        $user = config("services.sms.auth.user");
        $pass = config("services.sms.auth.pass");
        $fromNum = config("services.sms.auth.fromNum");
        $toNum = $phone;
        $pattern_code = "m7v01r9x9xc6f68";
        $input_data = array(
            'verify_code' => $code,
        );

        echo $this->client->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
    }
}