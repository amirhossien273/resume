<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Transaction extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'order_id',
        'psp',
        'price',
        'ref_number',
        'trace_number',
        "res_number",
        'card_code',
        'gateway_state',
        'ip',
        'state_enum',
        'bank_data',
        'succeeded_at',
    ];

    /**
     * Get the options for activity logging.
     *
     * This method is required by the LogsActivity trait. It defines the logging options
     * for this model, such as which attributes to log, the log name, and whether to log
     * only changed attributes (dirty attributes).
     *
     * @return \Spatie\Activitylog\LogOptions
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable)
            ->useLogName('transaction')
            ->logOnlyDirty();
    }
}
