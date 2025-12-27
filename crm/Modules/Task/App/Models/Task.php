<?php

namespace Modules\Task\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Media\App\Traits\HasMedia;
use Modules\Task\App\Enums\TaskStatus;

class Task extends Model
{
    use SoftDeletes,HasMedia;

    protected $fillable = [
        'src_id',
        'src_type',
        'title_id',
        'description',
        'status',
        'due_date',
        'task_time'
    ];

    protected $with =['title'];
    protected $casts = [
        'status' => TaskStatus::class,
    ];


    public function assignees()
    {
        return $this->hasMany(TaskAssignee::class, 'task_id');
    }

    public function src()
    {
        return $this->morphTo('src', 'src_type', 'src_id');
    }

    public static function getLabels(): array
    {
        $statuses = [];
        foreach (TaskStatus::cases() as $status) {
            $statuses[$status->value] = $status->label();
        }
        return $statuses;
    }

    public function title()
    {
        return $this->belongsTo(TaskTitle::class);
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            TaskStatus::Pending     => 'btn-warning',
            TaskStatus::InProgress  => 'btn-info',
            TaskStatus::Done        => 'btn-success',
            TaskStatus::Finished    => 'btn-success',
            TaskStatus::Canceled    => 'btn-danger',
            default                 => 'bg-gray-200 text-gray-800',
        };
    }


}
