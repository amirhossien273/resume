<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Module\Media\Src\Traits\HasMedia;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Slider extends Model
{
    use HasFactory, HasMedia, LogsActivity;

    protected $fillable = [
        'title',
        'intro',
        'url',
        'created_at',
        'updated_at',
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
            ->useLogName('slider')
            ->logOnlyDirty();
    }

}
