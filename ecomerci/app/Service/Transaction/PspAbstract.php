<?php

namespace App\Service\Transaction;


use App\Enums\TransactionStateEnum;
use App\Models\Order;
use App\Models\Transaction;
use Carbon\Carbon;
use Throwable;


abstract class PspAbstract
{
    protected ?int $_order = null;

    protected ?int $_amount = null;

    protected ?int $_transaction_id = null;

    protected ?string $_ref_number = null;

    protected ?string $_card_number = null;

    protected ?Transaction $_transaction = null;

    protected $_config = null;

    protected ?string $_psp_name = null;

    protected ?string $_call_back_url = null;

    protected ?string $_agent = null;

    protected  ?string $_token = null;

    /**
     * Transaction tracking code
     *
     * @var string
     */
    protected ?string $_trace_number = null;

    public function __construct()
    {
        $this->setPspName();
    }

    function setConfig($_config)
    {
        $this->_config = $_config;
    }

    /**
     * @return string
     */
    public function getRefNumber(): ?string
    {
        return $this->_ref_number;
    }

    /**
     * @return string
     */
    public function getCardNumber(): ?string
    {
        return $this->_card_number;
    }

    /**
     * @return string
     */
    public function getTraceNumber(): ?string
    {
        return $this->_trace_number;
    }

    public function getOrder(): ?Order
    {
        return $this->_order;
    }


    public function setOrder(int $_order)
    {
        $this->_order = $_order;
        // $this->_amount = $_order->final_price;
        return $this;
    }

    public function setAmont(int $monut)
    {
        $this->_amount = $monut;
        return $this;
    }


    public function getAgent()
    {
        return $this->_agent;
    }

    public function setAgent(string $_agent)
    {
        $this->_agent = $_agent;
        return $this;
    }

    /**
     * @return Transaction
     */
    public function getTransaction(): Transaction
    {
        return $this->_transaction;
    }

    /**
     * Get port id, $this->port
     *
     * @return int
     */
    function getPspName()
    {
        return $this->_psp_name;
    }

    /**
     * Get port id, $this->port
     *
     * @return void
     */
    abstract protected function setPspName();


    /**
     * Sets callback url
     * @param $url
     */
    abstract public function setCallback($url);

    /**
     * Gets callback url
     *
     * @return string
     */
    abstract public function getCallback();

    /**
     * This method use for done everything that necessary before redirect to port.
     *
     * @return $this
     * @throws Throwable
     */
    abstract public function ready();

    /**
     * This method use for redirect to port
     *
     * @return mixed
     */
    abstract public function redirect();

    /**
     * Insert new transaction to poolport_transactions table
     *
     * @return int last inserted id
     */
    protected function newTransaction()
    {
        $transaction =
            Transaction::create([
                "price" => $this->_amount,
                "psp" => $this->getPspName(),
                "agent" => $this->getAgent(),
                "state_enum" => TransactionStateEnum::TRANSACTION_INIT,
                "ip" => request()->ip(),
            ]);

        $this->_transaction_id = $transaction->id;

        session(['transaction' => json_encode($transaction->toArray())]);

        return $this->_transaction_id;
    }

    /**
     * Add query string to a url
     *
     * @param string $url
     * @param array $query
     * @return string
     */
    protected function makeCallback($url, array $query)
    {
        return $this->url_modify(array_merge($query, ['_token' => csrf_token()]), url($url));
    }

    /**
     * manipulate the Current/Given URL with the given parameters
     * @param $changes
     * @param  $url
     * @return string
     */
    protected function url_modify($changes, $url)
    {
        // Parse the url into pieces
        $url_array = parse_url($url);

        // The original URL had a query string, modify it.
        if (!empty($url_array['query'])) {
            parse_str($url_array['query'], $query_array);
            $query_array = array_merge($query_array, $changes);
        } // The original URL didn't have a query string, add it.
        else {
            $query_array = $changes;
        }

        return (!empty($url_array['scheme']) ? $url_array['scheme'] . '://' : null) .
            (!empty($url_array['host']) ? $url_array['host'] : null) .
            (!empty($url_array['port']) ? ':' . $url_array['port'] : null) .
            (!empty($url_array['path']) ? $url_array['path'] : null) .
            '?' . http_build_query($query_array);
    }

    /**
     * Return result of transaction
     * If result is done, return true, otherwise throws an related exception
     *
     * This method must be implements in child class
     *
     * @param Transaction $transaction row of transaction in database
     *
     * @return PspAbstract
     */
    function verify(Transaction $transaction)
    {
        $this->_transaction = $transaction;
        $this->_transaction_id = $transaction->id;
        $this->_amount = intval($transaction->price);
        $this->_ref_number = $transaction->ref_number;
    }

    /**
     * Failed transaction
     * Set status field to error status
     *
     * @return bool
     */
    protected function transactionFailed()
    {
        return Transaction::find($this->_transaction_id)->update([
            'state_enum' => TransactionStateEnum::TRANSACTION_FAILED,
            'updated_at' => Carbon::now(),
        ]);
    }

    /**
     * Commit transaction
     * Set status field to success status
     *
     * @param array $fields
     * @return mixed
     */
    protected function transactionSucceed(array $fields = [])
    {
        $updateFields = [
            'state_enum' => TransactionStateEnum::TRANSACTION_SUCCEED,
            'trace_number' => $this->_trace_number,
            'ref_number' => $this->_ref_number,
            'card_code' => $this->_card_number,
            'succeeded_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        if (!empty($fields))
            $updateFields = array_merge($updateFields, $fields);


        return Transaction::find($this->_transaction_id)->update($updateFields);
    }

    /**
     * Update transaction refId
     *
     * @return void
     */
    protected function transactionSetRefId()
    {
        return Transaction::find($this->_transaction_id)->update([
            'ref_number' => $this->_ref_number,
            'updated_at' => Carbon::now(),
        ]);

    }

}