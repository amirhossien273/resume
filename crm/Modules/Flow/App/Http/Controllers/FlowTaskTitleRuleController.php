<?php

namespace Modules\Flow\App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Flow\App\Http\Requests\StoreFlowTaskTitleRuleRequest;
use Modules\Flow\App\Http\Requests\UpdateFlowTaskTitleRuleRequest;
use Modules\Flow\App\Models\Flow;
use Modules\Flow\App\Models\FlowStep;
use Modules\Flow\App\Models\FlowTaskTitleRule;
use Modules\Task\App\Models\TaskTitle;

class FlowTaskTitleRuleController extends Controller
{
    public function index()
    {
        $rules = FlowTaskTitleRule::with([
            'flow',
            'fromStep',
            'toStep',
            'taskTitle'
        ])->latest()->get();

        $flows = Flow::orderBy('name')->get();

        $taskTitles = TaskTitle::orderBy('title')->get();

        // steps grouped by flow_id for alpine
        $flowStepsByFlow = FlowStep::orderBy('order')
            ->get()
            ->groupBy('flow_id')
            ->map(fn ($steps) => $steps->values());

        return view('flow::rules.index', compact(
            'rules',
            'flows',
            'taskTitles',
            'flowStepsByFlow'
        ));
    }

    public function store(StoreFlowTaskTitleRuleRequest $request): RedirectResponse
    {
        $data = $request->validated();

        FlowTaskTitleRule::create([
            'flow_id'       => $data['flow_id'],
            'task_title_id' => $data['task_title_id'],
            'from_step_id'  => $data['from_step_id'] ?? null,
            'to_step_id'    => $data['to_step_id'],
            'is_active'     => $data['is_active'] ?? true,
        ]);

        return back()->with('success', 'Rule با موفقیت ثبت شد.');
    }

    public function update(UpdateFlowTaskTitleRuleRequest $request, FlowTaskTitleRule $rule): RedirectResponse
    {
        $data = $request->validated();

        $rule->update([
            'flow_id'       => $data['flow_id'],
            'task_title_id' => $data['task_title_id'],
            'from_step_id'  => $data['from_step_id'] ?? null,
            'to_step_id'    => $data['to_step_id'],
            'is_active'     => $data['is_active'] ?? $rule->is_active,
        ]);

        return back()->with('success', 'Rule با موفقیت ویرایش شد.');
    }

    public function destroy(FlowTaskTitleRule $rule): RedirectResponse
    {
        $rule->delete();
        return back()->with('success', 'Rule حذف شد.');
    }
}
