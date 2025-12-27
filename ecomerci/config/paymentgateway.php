<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Payment Gateway
    |--------------------------------------------------------------------------
    |
    | Below you may configure as many payment gateway as necessary, and you
    | may even configure multiple gateway for the same payment. Examples for
    | most supported storage drivers are configured here for reference.
    |
    | Supported Payment Gateway: "zarinpal"
    |
    */

    'zarinpal' => [
        
        /*
        |--------------------------------------------------------------------------
        | Payment Gateway URL
        |--------------------------------------------------------------------------
        |
        | This URL is the endpoint to which your payment requests will be sent. 
        | This is usually provided by the payment gateway service.
        |
        */

        'url' => env('PAYMENT_GATEWAY_ZARINPAL', 'https://api.zarinpal.com'),

        /*
        |--------------------------------------------------------------------------
        | API Key
        |--------------------------------------------------------------------------
        |
        | The API key is used to authenticate your requests to the payment gateway. 
        | You will get this key from the payment gateway service once you sign up 
        | for their services.
        |
        */

        'api_key' => env('API_KEY_ZARINPAL', '77e5ffbc-c325-4e17-aa70-5dc776983e39'),

        /*
        |--------------------------------------------------------------------------
        | Callback URL
        |--------------------------------------------------------------------------
        |
        | This is the URL to which the payment gateway will send the response after 
        | processing the payment. It is used to update the payment status in your 
        | application. Make sure this URL is accessible from the internet.
        |
        */
        
        'callback_url' => "http://samieattar.local:8000/payment/verify/",
    ],

];