<?php
namespace App\Services;

use App\Models\User;
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

    public function sendSMS(User $client)
    {
        $user = config("services.sms.auth.user");
        $pass = config("services.sms.auth.pass");
        $fromNum = config("services.sms.auth.fromNum");
        $toNum = $client->phone;
        $pattern_code = "6nvuf9krddxh8cj";
        $input_data = array(
            'name' => $client->name,
            'car' => 'بنز',
            'company' => 'شرکت پیشرو',
        );

        echo $this->client->sendPatternSms($fromNum, $toNum, $user, $pass, $pattern_code, $input_data);
    }
}