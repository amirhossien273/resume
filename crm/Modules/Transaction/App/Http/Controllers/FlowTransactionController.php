<?php

namespace Modules\Transaction\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Flow\App\Models\Flow;
use Modules\Flow\App\Models\FlowableHistory;
use Modules\Transaction\App\Models\Transaction;


class FlowTransactionController extends Controller
{
    public function flow()
    {
        $flowModel = Flow::where('slug', 'transaction')
            ->with('steps')
            ->first();

        $flow = $flowModel?->toArray();

        $transactions = Transaction::with(['flowable', 'customer.city.province'])
            ->get()
            ->toArray();

        return view('transaction::flow.index', compact('flow', 'transactions'));
    }


    public function updateStep(Request $request, Transaction $transaction)
    {
        $request->validate([
            'step_id' => 'required|integer|exists:flow_steps,id',
        ]);


        if ($transaction->flowable) {
            $transaction->flowable->current_step_id = $request->step_id;
            $transaction->flowable->save();

            FlowableHistory::create([
                'flowable_id' => $transaction->flowable->id,
                'step_id' => $request->step_id,
                'user_id' => auth()->id(),
                'comment' => 'تغییر مرحله',
            ]);

            return response()->json([
                'success' => true,
                'transaction_id' => $transaction->id,
                'new_step_id' => $request->step_id
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Flowable not found.'
        ], 404);
    }
}
