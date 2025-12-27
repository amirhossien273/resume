<?php

namespace App\Service\SMS\Kavenegar;

use App\Service\SMS\SendMessageInterface;
use GuzzleHttp\Client;

class SendWithKavengarService implements SendMessageInterface {

    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function send(string $to, string $message, string $template): bool
    {
        $url = config('sms.kavenegar.url').'v1/'.config('sms.kavenegar.api_key')."/verify/lookup.json?receptor={$to}&token={$message}&template={$template}";

        try{
            $this->client->get($url);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

}