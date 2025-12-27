<?php

namespace Modules\Flow\App\Services;

use Modules\Transaction\App\Models\Transaction;
use Modules\Flow\App\Models\Flow;
use Modules\Flow\App\Models\Flowable;
use Modules\Flow\App\Models\FlowableHistory;

class FlowableService
{
    public function assignTransactionFlow(Transaction $transaction): void
    {
        $flow = Flow::where('slug', 'transaction')->first();
        if (!$flow) return;

        $firstStep = $flow->steps()->orderBy('order')->first();

        $flowable = Flowable::create([
            'flow_id' => $flow->id,
            'src_id' => $transaction->id,
            'src_type' => Transaction::class,
            'current_step_id' => $firstStep?->id,
            'status' => 'active',
        ]);
        if ($firstStep) {
            FlowableHistory::create([
                'flowable_id' => $flowable->id,
                'step_id' => $firstStep->id,
                'user_id' => auth()->id(),
                'comment' => 'شروع فرآیند',
            ]);
        }
    }
}
