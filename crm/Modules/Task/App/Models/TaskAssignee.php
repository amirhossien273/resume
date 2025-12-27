<?php

namespace Modules\Task\App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\App\Models\User;

class TaskAssignee extends Model
{
    protected $fillable = [
        'user_id',
        'task_id',
        'assigned_at',
        'assigned_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function assignedBy()
    {
        return $this->belongsTo(User::class, 'assigned_by');
    }


}
