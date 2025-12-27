<?php

namespace App\Models;

use App\Enums\OrderStateEnum;
use App\Models\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Order extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    
    protected $fillable = [
        "unique_id",
        'final_price',
        'total_price',
        'total_discount_price',
        'total_count',
        'shipping_price',
        'invoiced_at',
        'shipped_at',
        'shipment', 
        'post_tracking_code',
        'post_response',
        'post_param',
        'is_dropshipp',
        'note',
        'note_manage',
        'state_enum', 
        'address',
        'reordered_id',
        'voucher_id',
        'creator_id',
    ];

    protected $appends = ['state'];

    /**
     * The attributes that need casting.
     *
     * @var array
     */
    protected $casts = [
        'address' => Json::class
    ];

    /**
     * Get the Persian (Farsi) translation of the order state.
     *
     * @return string The Persian translation of the state.
     */
    public function getStateAttribute()
    {
        return OrderStateEnum::getPersianTranslation($this->attributes['state_enum']);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'order_id');
    }

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
            ->useLogName('order')
            ->logOnlyDirty();
    }


}
