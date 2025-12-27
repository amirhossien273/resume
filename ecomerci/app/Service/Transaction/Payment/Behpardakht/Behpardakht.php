<?php


namespace App\Service\Transaction\Payment\Behpardakht;


use App\Service\Transaction\PspAbstract;
use DateTime;
use Exception;
use SoapClient;
use SoapFault;

class Behpardakht extends PspAbstract
{
    /**
     * Address of main SOAP server
     *
     * @var string
     */
    protected $_server_url = 'https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl';

    /**
     * {@inheritdoc}
     */
    public function redirect()
    {
        $refId = $this->getRefNumber();
        $mobile = auth()->user()->mobile;
        return view('front.page.redirect')->with(compact('refId', 'mobile'));
    }

    /**
     * Sets callback url
     * @param $url
     * @return Behpardakht
     */
    function setCallback($url)
    {
        $this->_call_back_url = $url;
        return $this;
    }

    /**
     * Gets callback url
     * @return string
     * @throws Exception
     */
    public function getCallback()
    {
        if(!$this->_call_back_url)
            throw new Exception('مشکلی در روند پرداخت رخ داده است، لطفا مجددا تلاش فرمایید.');

        return $this->makeCallback($this->_call_back_url, []);
    }

    /**
     * {@inheritdoc}
     */
    public function ready()
    {
        $this->sendPayRequest();

        return $this;
    }

    /**
     * Send pay request to server
     *
     * @return void
     *
     * @throws BehpardakhtException
     * @throws SoapFault
     */
    protected function sendPayRequest()
    {
        $dateTime = new DateTime();

        $this->newTransaction();

        $fields = [
            'terminalId' => '8253181',
            'userName' => '8253181',
            'userPassword' => '60935089',
            'orderId' =>  $this->_transaction_id,
            'amount' => $this->_amount * 10,
            'localDate' => $dateTime->format('Ymd'),
            'localTime' => $dateTime->format('His'),
            'additionalData' => '',
            'callBackUrl' => $this->getCallback(),
            'payerId' => 0,
        ];


        try {
            $soap = new SoapClient($this->_server_url);
            $response = $soap->bpPayRequest($fields);

        } catch (SoapFault $e) {
            $this->transactionFailed();
//            $this->newLog('SoapFault', $e->getMessage());
            throw $e;
        }

        $response = explode(',', $response->return);

        if ($response[0] != '0') {
            $this->transactionFailed();
            throw new Exception('مشکلی در روند پرداخت رخ داده است، لطفا مجددا تلاش فرمایید.');
        }

         $this->_ref_number = $response[1];
        // $this->transactionSetRefId();
    }

    /**
     * {@inheritdoc}
     * @throws BehpardakhtException
     * @throws SoapFault
     * @throws SoapFault
     */
    public function verify($transaction)
    {
        parent::verify($transaction);

        $this->userTransaction();
        $this->verifyTransaction();

        /**
         * Settle is automatically called by BehPardakht each 3 hours
         */
        //$this->settleRequest();

        $this->transactionSucceed();

        return $this;
    }

    /**
     * Check user transaction
     *
     * @return bool
     *
     * @throws BehpardakhtException
     */
    protected function userTransaction()
    {
        $this->_ref_number = request()->input('RefId');
        $this->_trace_number = request()->input('SaleReferenceId');
        $this->_card_number = request()->input('CardHolderPan');
        $payRequestResCode = request()->input('ResCode');

        if ($payRequestResCode == '0') {
            return true;
        }

        $this->transactionFailed();
        throw new BehpardakhtException($payRequestResCode);
    }

    /**
     * Verify user transaction from bank server
     *
     * @return bool
     *
     * @throws BehpardakhtException
     * @throws SoapFault
     */
    protected function verifyTransaction()
    {
        $fields = [
            'terminalId' => '8253181',
            'userName' => '8253181',
            'userPassword' => '60935089',
            'orderId' => $this->_transaction_id,
            'saleOrderId' => $this->_transaction_id,
            'saleReferenceId' => $this->_trace_number
        ];

        try {
            $soap = new SoapClient($this->_server_url);
            $response = $soap->bpVerifyRequest($fields);

        } catch (SoapFault $e) {
            $this->transactionFailed();
//            $this->newLog('SoapFault', $e->getMessage());
            throw $e;
        }

        if ($response->return != '0') {
            $this->transactionFailed();
//            $this->newLog($response->return, BehpardakhtException::$errors[$response->return]);
         throw new Exception('مشکلی در روند پرداخت رخ داده است، لطفا مجددا تلاش فرمایید.');
    }

        return true;
    }

    /**
     * Send settle request
     *
     * @return bool
     *
     * @throws BehpardakhtException
     * @throws SoapFault
     */
    protected function settleRequest()
    {
        $fields = [
            'terminalId' => '8253181',
            'userName' => '8253181',
            'userPassword' => '60935089',
            'orderId' => $this->_transaction_id,
            'saleOrderId' => $this->_transaction_id,
            'saleReferenceId' => $this->_trace_number
        ];

        try {
            $soap = new SoapClient($this->_server_url);
            $response = $soap->bpSettleRequest($fields);

        } catch (SoapFault $e) {
            $this->transactionFailed();
//            $this->newLog('SoapFault', $e->getMessage());
            throw $e;
        }

        if ($response->return == '0' || $response->return == '45') {
            $this->transactionSucceed();
//            $this->newLog($response->return, GatewayEnum::TRANSACTION_SUCCEED_TEXT);
            return true;
        }

        $this->transactionFailed();
//        $this->newLog($response->return, BehpardakhtException::$errors[$response->return]);
        throw new BehpardakhtException($response->return);
    }

    protected function setPspName()
    {
        $this->_psp_name = 'Behpardakht';
    }
}
