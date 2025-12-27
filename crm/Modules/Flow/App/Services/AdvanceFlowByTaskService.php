<?php

namespace Modules\Flow\App\Services;

use Illuminate\Support\Facades\DB;
use Modules\Flow\App\Models\FlowableHistory;
use Modules\Flow\App\Models\FlowTaskTitleRule;
use Modules\Task\App\Models\Task;

class AdvanceFlowByTaskService
{
    public function handle(Task $task): void
    {
        if ($task->status?->value !== 'done') {
            return;
        }

        $src = $task->src;
        if (! $src || ! method_exists($src, 'flowable')) {
            return;
        }

        DB::transaction(function () use ($task, $src) {

            $flowable = $src->flowable()->lockForUpdate()->first();
            if (! $flowable) {
                return;
            }

            $rule = FlowTaskTitleRule::query()
                ->where('flow_id', $flowable->flow_id)
                ->where('task_title_id', $task->title_id)
                ->where('is_active', true)
                ->where(function ($q) use ($flowable) {
                    $q->whereNull('from_step_id')
                        ->orWhere('from_step_id', $flowable->current_step_id);
                })
                ->orderByRaw('from_step_id IS NULL')
                ->first();

            if (! $rule || ! $rule->to_step_id) {
                return;
            }

            if ((int)$flowable->current_step_id === (int)$rule->to_step_id) {
                return;
            }

            $flowable->update([
                'current_step_id' => $rule->to_step_id,
            ]);

            foreach ($task->assignees as $assignee) {
                FlowableHistory::create([
                    'flowable_id' => $flowable->id,
                    'step_id'     => $rule->to_step_id,
                    'user_id'     => $assignee->user_id,
                    'task_id'     => $task->id,
                    'comment'     => "Step changed by task: {$task->title->name}",
                ]);
            }
        });
    }
}
