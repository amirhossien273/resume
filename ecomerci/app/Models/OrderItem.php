<?php

namespace App\Models;

use App\Enums\OrderItemStateEnum;
use App\Models\Casts\Json;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class OrderItem extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'order_id',
        'product_item_id',
        'requested_quantity',
        'sent_quantity',
        'approved_quantity',
        'state_enum',
        'product_title',
        'product_unit_old_price',
        'product_unit_price',
        'product_total_price',
        'product_variations',
        'product_images',
        'creator_id',
    ];

    protected $appends = ['state'];

    /**
     * The attributes that need casting.
     *
     * @var array
     */
    protected $casts = [
        'product_images' => Json::class
    ];

    /**
     * Get the Persian (Farsi) translation of the order state.
     *
     * @return string The Persian translation of the state.
     */
    public function getStateAttribute()
    {
        return OrderItemStateEnum::getPersianTranslation($this->attributes['state_enum']);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(ProductItem::class, 'product_item_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
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
            ->useLogName('orderItem')
            ->logOnlyDirty();
    }

}
