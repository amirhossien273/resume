<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductItem extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        "product_id",
        "state_enum",
        "reject_reason",
        "price",
        'quantity',
        'consign_quantity',
        'strikethrough_price',
        'total_quantity',
        'max_basket_limit',
        'is_available',
        'is_active',
        'is_special',
        'is_new',
        'is_best_seller',
        'is_on_sale',
        'box',
        'show_order',
        "category_id",
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variationOptions()
    {
        return $this->belongsToMany(VariationOption::class, 'variation_option_product_items');
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
            ->useLogName('productItem')
            ->logOnlyDirty();
    }
    public function firstMedia()
    {
        return $this->hasOne(Media::class)->oldest(); // or whatever ordering you prefer
    }
}
