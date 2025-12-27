<?php

namespace Modules\Flow\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Task\App\Models\Task;

class FlowableHistory extends Model {
    use SoftDeletes;
    protected $fillable = ['flowable_id', 'step_id', 'user_id', 'comment','task_id'];

    protected $with = ['step'];

    public function step() {
        return $this->belongsTo(FlowStep::class);
    }
    public function flowable() {
        return $this->belongsTo(Flowable::class);
    }
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

}
