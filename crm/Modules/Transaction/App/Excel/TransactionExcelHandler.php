<?php

namespace Modules\Transaction\App\Excel;

use Illuminate\Http\Request;
use Modules\Excel\App\Contracts\Excelable;
use Modules\Transaction\App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Morilog\Jalali\Jalalian;

class TransactionExcelHandler implements Excelable
{
    public function __construct(private Request $request) {}
    public function query(): Builder
    {
        return Transaction::with(['customer', 'product', 'transactionType'])
            ->applyFilters($this->request);
    }

    public function processInChunks(int $chunkSize = 100, callable $callback)
    {
        $this->query()->chunk($chunkSize, function ($transactions) use ($callback) {
            foreach ($transactions as $transaction) {
                $callback($transaction);
            }
        });
    }

    public function headers(): array
    {
        return [
            'نام معامله',
            'مشتری',
            'محصول',
            'مبلغ',
            'مبلغ تقریبی',
            'نوع آشنایی',
            'تاریخ پیشنهادی',
            'تاریخ ایجاد',
            'وضعیت',
        ];
    }

    public function map($transaction): array
    {
        return [
            $transaction->name,
            $transaction->customer?->full_name ?? '-',
            $transaction->product?->name ?? '-',
            $transaction->amount ? number_format($transaction->amount) . ' تومان' : '-',
            $transaction->approximate_amount ? number_format($transaction->approximate_amount) . ' تومان' : '-',
            $transaction->transaction_type?->name ?? '-',
            $transaction->deal_closed_at,
            $transaction->created_at ? Jalalian::fromCarbon($transaction->created_at)->format('Y/m/d') : '-',
            Transaction::STATUS[$transaction->status] ?? '-',
        ];
    }

    public function import(Collection $row) :void
    {

    }

}
