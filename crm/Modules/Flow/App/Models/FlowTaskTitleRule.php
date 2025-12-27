<?php

namespace Modules\Flow\App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Task\App\Models\TaskTitle;

class FlowTaskTitleRule extends Model
{
    protected $fillable = [
        'flow_id',
        'task_title_id',
        'from_step_id',
        'to_step_id',
        'is_active',
    ];

    public function flow()
    {
        return $this->belongsTo(Flow::class);
    }

    public function fromStep()
    {
        return $this->belongsTo(FlowStep::class, 'from_step_id');
    }

    public function toStep()
    {
        return $this->belongsTo(FlowStep::class, 'to_step_id');
    }

    public function taskTitle()
    {
        return $this->belongsTo(TaskTitle::class, 'task_title_id');
    }

}
