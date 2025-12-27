<?php

namespace Modules\Flow\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Flow\App\Models\Flow;
use Modules\Flow\App\Models\Flowable;
use Modules\Flow\App\Models\FlowableHistory;

class FlowableController extends Controller
{
    // اختصاص یک فلوی کاری به هر مدل دلخواه (Polymorphic)
    public function assignFlow(Request $request)
    {
        $request->validate([
            'flow_id' => 'required|exists:flows,id',
            'src_id' => 'required',
            'src_type' => 'required|string'
        ]);

        $flow = Flow::findOrFail($request->flow_id);
        $firstStep = $flow->steps()->orderBy('order')->first();

        $flowable = Flowable::create([
            'flow_id' => $flow->id,
            'src_id' => $request->src_id,
            'src_type' => $request->src_type,
            'current_step_id' => $firstStep->id,
            'status' => 'active'
        ]);

        return response()->json($flowable->load('flow.steps'), 201);
    }

    // پیشرفت مرحله به مرحله بعد
    public function advanceStep(Request $request, Flowable $flowable)
    {
        $currentStep = $flowable->currentStep;
        $nextStep = $flowable->flow->steps()->where('order', '>', $currentStep->order)->orderBy('order')->first();

        // ثبت تاریخچه
        FlowableHistory::create([
            'flowable_id' => $flowable->id,
            'step_id' => $currentStep->id,
            'user_id' => auth()->id(),
            'comment' => $request->comment ?? null
        ]);

        if ($nextStep) {
            $flowable->current_step_id = $nextStep->id;
        } else {
            $flowable->status = 'completed';
        }

        $flowable->save();

        return response()->json($flowable->load('currentStep', 'flow.steps'));
    }

    // نمایش وضعیت یک موجودیت در فلوی کاری
    public function show(Flowable $flowable)
    {
        return $flowable->load('currentStep', 'flow.steps', 'histories');
    }
}
