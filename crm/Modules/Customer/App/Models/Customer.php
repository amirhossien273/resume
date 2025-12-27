<?php

namespace Modules\Customer\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'firstname',
        'lastname',
        'national_code',
        'mobile',
        'email',
        'address',
        'company',
        'company_phone',
        'business_id',
        'type',
        'customer_type',
        'status',
        'province_id',
        'city_id',
        'userable_id',
        'userable_type',
    ];

    protected $with = [
        'business:id,name'
    ];

    protected $appends = [
        'type_label',
        'customer_type_label',
        'full_name',
        'business_name',
    ];

    protected $attributes = [
        'type' => 'person',
        'status' => 'actual',
    ];
    public const TYPES = [
        'person' => 'حقیقی',
        'company' => 'حقوقی',
    ];

        public const CUSTOMERTYPES = [
        'consumer' => 'مصرف کننده',
        'coworker' => 'همکار',
        'agent' => 'خش کننده یا نماینده',
    ];

    public function getFullNameAttribute(): string
    {
        return trim($this->firstname . ' ' . $this->lastname);
    }
    public function getCustomerTypeLabelAttribute(): string
    {
        return self::CUSTOMERTYPES[$this->customer_type] ?? '';
    }

    public function getTypeLabelAttribute(): string
    {
        return self::TYPES[$this->type] ?? $this->type;
    }
    public function getBusinessNameAttribute(): ?string
    {
        return $this->business?->name;
    }

    public function userable()
    {
        return $this->morphTo();
    }


    public function province()
    {
        return $this->belongsTo(Province::class);
    }


    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public static function getTypes(): array
    {
        return self::TYPES;
    }
    public static function getCustomerTypes(): array
    {
        return self::CUSTOMERTYPES;
    }

    public function scopeLead($query)
    {
        return $query->where('status', 'potential');
    }

    public function scopeCustomer($query)
    {
        return $query->where('status', 'actual');
    }
}
