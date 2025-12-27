<?php

namespace App\Service\Transaction\Payment\Zarinpal;

use App\Service\Transaction\Payment\PaymentInterface;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PaymentWithZarinpal implements PaymentInterface {

    /**
     * @var Client
     */
    private $client;

    /**
     * Constructor to initialize Guzzle HTTP client.
     *
     * @param Client $client The Guzzle HTTP client instance.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Initiates a payment request.
     *
     * This method sends a payment request to the Zarinpal payment gateway.
     * It merges the provided data with necessary configuration settings.
     *
     * @param array $data The data required for the payment request.
     * @return array The response status and URL if successful, or an error message if failed.
     * @throws \Exception If there is an error during the request.
     */
    public function payment(array $data)
    {
        $data = array_merge($data, [
            "merchant_id"  => config("paymentgateway.zarinpal.api_key"),
            "callback_url" => config("paymentgateway.zarinpal.callback_url"),
        ]);

        $url = config("paymentgateway.zarinpal.url") . '/pg/v4/payment/request.json';

        try {

            $response = $this->client->post($url, ['json' => $data]);
            $result = json_decode($response->getBody()->getContents());

            // dd(config("paymentgateway.zarinpal.url") . '/pg/StartPay/' . $result->data->authority);
            if (!empty($result->data)) {
                return [
                    'status' => true,
                    'url'    => config("paymentgateway.zarinpal.url") . '/pg/StartPay/' . $result->data->authority,
                ];
            }
            return [
                'status' => false,
                'message' => $result->errors->message,
            ];

        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }
    }

    /**
     * Verifies the payment status.
     *
     * This method verifies the payment status after the payment process has been initiated.
     * It typically involves checking the payment gateway's response to confirm if the payment was successful.
     *
     * @param Request $request The HTTP request containing the verification data.
     * @return mixed The response after verifying the payment status.
     */
    public function paymentVerify(Request $request)
    {
       if(!$request->has('Authority') || !$request->has('Status') || $request->get("Status") !== "OK") {

          return $this->messages(false, 'message', __("messages.paymentGateway.callback"));
        }

        $url = config("paymentgateway.zarinpal.url") . '/pg/v4/payment/verify.json';

        $data = [
            "merchant_id" => config("paymentgateway.zarinpal.api_key"),
            "amount" => $request->amount,
            "authority" => $request->Authority,
        ];


        try {

            $response = $this->client->post($url, ['json' => $data]);
            $result = json_decode($response->getBody()->getContents());


            if (!empty($result->data)) {

                if (is_object($result->data)) {
                    return (array) $result->data;
                }
                return $result->data;
            }

            return $this->messages(false, 'message', __("messages.paymentGateway.callback"));

        } catch (\Exception $exception) {
            throw new \Exception($exception->getMessage());
        }


    }

    private function messages(bool $status, string $key, $data)
    {
        return [
            'status' => $status,
            $key => $data,
        ];
    }
}
