<?php

namespace Modules\Flow\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flowable extends Model
{
    use SoftDeletes;

    protected $fillable = ['src_type', 'src_id', 'flow_id', 'current_step_id', 'status'];

    public function flow()
    {
        return $this->belongsTo(Flow::class);
    }

    public function currentStep()
    {
        return $this->belongsTo(FlowStep::class, 'current_step_id');
    }

    // polymorphic relation
    public function src()
    {
        return $this->morphTo();
    }

    public function histories()
    {
        return $this->hasMany(FlowableHistory::class);
    }
}
