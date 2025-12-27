<?php

namespace Modules\Transaction\Observers;

use Modules\Invoice\App\Services\InvoiceCreator;
use Modules\Transaction\App\Models\Transaction;

class TransactionObserver
{
    public function updated(Transaction $transaction): void
    {
        if (! $transaction->wasChanged('status')) {
            return;
        }

        if ($transaction->status!== 'success') {
            return;
        }

        // اگر قبلاً فاکتور دارد، کاری نکن
        if ($transaction->invoices()->exists()) {
            return;
        }

        app(InvoiceCreator::class)->createFromSource(
            $transaction,
            [
                'customer_id' => $transaction->customer_id,
                'customer_first_name' => $transaction->customer->firstname,
                'customer_last_name'  => $transaction->customer->lastname,
                'customer_mobile'     => $transaction->customer->mobile,
                'customer_address'    => $transaction->customer->address,
            ]
        );
    }
}
