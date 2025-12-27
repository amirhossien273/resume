<?php

namespace Modules\Flow\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Flow extends Model {
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'created_by', 'slug'];

    protected $casts = [
        'slug' => 'string',
    ];


    protected array $allowedSlugs = [
        'sale',
        'transaction',
        'customer-service',
    ];


    public function setSlugAttribute($value)
    {
        $value = strtolower(trim($value));

        if (! in_array($value, $this->allowedSlugs)) {
            throw new \InvalidArgumentException("Invalid slug value: $value");
        }

        $this->attributes['slug'] = $value;
    }


    public function getSlugAttribute($value)
    {
        return strtolower($value);
    }

    public function steps()
    {
        return $this->hasMany(FlowStep::class)->orderBy('order');
    }
}
