<?php

namespace Modules\Flow\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class FlowStep extends Model {
    use SoftDeletes;
    protected $table = 'flow_steps';
    protected $fillable = ['flow_id', 'name', 'order', 'type'];
    public function flow() {
        return $this->belongsTo(Flow::class);
    }
}

