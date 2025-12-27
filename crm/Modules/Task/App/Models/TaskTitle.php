<?php

namespace Modules\Task\App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskTitle extends Model
{
    protected $fillable = ['title','is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
