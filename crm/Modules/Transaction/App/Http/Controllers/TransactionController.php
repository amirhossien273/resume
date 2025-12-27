<?php

namespace Modules\Transaction\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Excel\App\Services\ExcelService;
use Modules\Flow\App\Services\FlowableService;
use Modules\Transaction\App\Excel\TransactionExcelHandler;
use Modules\Notification\App\Events\NotificationRequested;
use Modules\Transaction\App\Enums\ShareTypeEnum;
use Modules\Transaction\App\Http\Requests\Transaction\StoreTransactionRequest;
use Modules\Transaction\App\Http\Requests\Transaction\UpdateTransactionRequest;
use Modules\Transaction\App\Models\TransactionFailedReason;
use Modules\Transaction\App\Models\Transaction;
use Modules\Transaction\App\Models\Responsible;
use Modules\Transaction\App\Services\ResponsibleShareDividerService;
use Morilog\Jalali\Jalalian;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = collect($request->only(['from', 'to', 'status']))
            ->filter(fn ($v) => filled($v));

        if ($filters->isEmpty() && $request->query()) {
            return redirect()->route('transaction.index');
        }

        $transactions = Transaction::with([
            'invoices',
            'product',
            'transactionType',
            'customer.city.province',
            'failedReason',
        ])
            ->applyFilters(new Request($filters->toArray()))
            ->get();
        $reasons = TransactionFailedReason::active()->get();
        return view('transaction::transactions.index', compact('transactions', 'reasons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaction::transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreTransactionRequest $request,
        FlowableService         $flowableService,
    ): RedirectResponse
    {
        $data = $request->validated();
        $customerId = $request->filled('customer_id')
            ? $request->customer_id
            : (\Modules\Customer\App\Models\Customer::create([
                'firstname'     => $request->firstname,
                'lastname'      => $request->lastname,
                'mobile'         => $request->mobile,
                'province_id'   => $request->province_id,
                'city_id'       => $request->city_id,
                'address'       => $request->address,
                'type'          => $request->type,
                'status'        =>'actual',
                'company'        => $request->type === 'company' ? $request->company : null,
                'company_phone'  => $request->type === 'company' ? $request->company_phone : null,
                'business_id'    => $request->business_id,
                'customer_type'  => $request->customers_type,
            ])->id);

        $data['customer_id'] = $customerId;
        $data['creator_id'] = auth()->id();

        $transaction = Transaction::create($data);

        $creatorName = auth()->user()->full_name;


        if ($request->filled('responsibles')) {
            foreach ($request->responsibles as $responsible) {
                $responsible = Responsible::create([
                    'model_id' => $responsible['user_id'],
                    'model_type' => $request->responsible_type,
                    'share_type' => ShareTypeEnum::PERCENT,
                    'share_value' => $responsible['share_value'],
                    'transaction_id' => $transaction->id,
                ]);
                event(new NotificationRequested(
                    $responsible,
                    $responsible->model_id,
                    [
                        'title' => 'دعوت به همکاری',
                        'message' => "شما توسط {$creatorName} به یک معامله جدید با {$responsible->share_value}٪ سهم دعوت شدید.",
                        'url' => route('transaction.show', $transaction) . '?invite=' . $responsible->id,
                    ]
                ));

            }
        }
        $flowableService->assignTransactionFlow($transaction);

        $to = $request->input('redirect');

        if ($to && str_starts_with($to, url('/'))) {
            return redirect()->to($to)->with('success', 'تراکنش با موفقیت ایجاد شد.');
        }

        return redirect()->route('transaction.index')->with('success', 'تراکنش با موفقیت ایجاد شد.');

    }

    /**
     * Show the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $transaction->load([
            'transactionType',
            'tasks' => fn($q) => $q->latest('created_at'),
            'flowable.histories' => fn($q) => $q->latest('created_at'),
            'responsibles.model'
        ]);

        $transaction->tasks->transform(function ($task) {
            $task->task_time = $task->task_time
                ? \Carbon\Carbon::createFromFormat('H:i:s', $task->task_time)->format('H:i')
                : null;

            return $task;
        });

        $transaction->created_at_shamsi = Jalalian::fromCarbon($transaction->created_at)->format('Y-m-d');
        $invite = null;
        if (request()->filled('invite')) {
            $inviteId = request('invite');

            $invite = \Modules\Transaction\App\Models\Responsible::query()
                ->where('id', $inviteId)
                ->where('transaction_id', $transaction->id)
                ->where('model_id', auth()->id())
                ->where('status', 'pending')
                ->first();
        }

        return view('transaction::transactions.show', compact('transaction', 'invite'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $transaction = Transaction::with([
            'responsibles.model'
        ])->findOrFail($id);
        return view('transaction::transactions.edit', compact('transaction'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateTransactionRequest $request,
        Transaction              $transaction,
    ): RedirectResponse
    {
        $transaction->update([
            'approximate_amount' => $request->approximate_amount,
            'deal_closed_at' => $request->deal_closed_at,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        $creatorName = auth()->user()->full_name;

        if ($request->filled('responsibles')) {

            Responsible::where('transaction_id', $transaction->id)->delete();

            foreach ($request->responsibles as $item) {

                $responsible = Responsible::create([
                    'model_id' => $item['user_id'],
                    'model_type' => $request->responsible_type,
                    'share_type' => ShareTypeEnum::PERCENT,
                    'share_value' => $item['share_value'],
                    'transaction_id' => $transaction->id,
                ]);

                event(new NotificationRequested(
                    $responsible,
                    $responsible->model_id,
                    [
                        'title' => 'دعوت به همکاری',
                        'message' => "شما توسط {$creatorName} به یک معامله جدید با {$responsible->share_value}٪ سهم دعوت شدید.",
                        'url' => route('transaction.show', $transaction) . '?invite=' . $responsible->id,
                    ]
                ));

            }
        }
        return redirect()
            ->route('transaction.index')
            ->with('success', 'تراکنش با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();
        return redirect()
            ->route('transaction.index')
            ->with('success', 'تراکنش حذف شد.');
    }

    public function changeStatus(Request $request, Transaction $transaction)
    {
        $data = $request->validate([
            'status' => 'required|in:running,success,failed',
            'failed_reason_id' => 'required_if:status,failed|exists:transaction_failed_reasons,id',
            'failed_description' => 'nullable|string|max:1000',
        ]);

        $transaction->update($data);

        return redirect()->route('transaction.index')->with('success', 'وضعیت معامله با موفقیت تغییر یافت.');
    }

    public function export(Request $request, ExcelService $excel)
    {
        $handler = new TransactionExcelHandler($request);
        $chunkSize = 200;

        return $excel->exportChunked(
            $handler,
            'transactions.xlsx',
            $chunkSize
        );
    }

    private function applyFilters(Request $request)
    {
        return Transaction::with(['customer', 'product', 'transactionType'])
            ->when($request->filled('status'), function ($q) use ($request) {
                $q->where('status', $request->status);
            })
            ->when($request->filled('from'), function ($q) use ($request) {
                $q->whereDate('created_at', '>=', $request->from);
            })
            ->when($request->filled('to'), function ($q) use ($request) {
                $q->whereDate('created_at', '<=', $request->to);
            });
    }

}
