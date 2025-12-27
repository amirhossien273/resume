<?php

namespace Modules\Task\App\Observers;

use Modules\Task\App\Models\Task;
use Modules\Flow\App\Services\AdvanceFlowByTaskService;

class TaskObserver
{
    public function created(Task $task): void
    {
        if ($task->status?->value === 'done') {
            app(AdvanceFlowByTaskService::class)->handle($task);
        }
    }

    public function updated(Task $task): void
    {
        if ($task->wasChanged('status') && $task->status?->value === 'done') {
            app(AdvanceFlowByTaskService::class)->handle($task);
        }
    }
}
