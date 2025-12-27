<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class CartItem extends Model
{
    use HasFactory, LogsActivity;


    protected $fillable = [
        'product_item_id',
        'quantity',
        'creator_id',
    ];


    /**
     * Get the product item associated with the cart item.
     */
    public function productItem()
    {
        return $this->belongsTo(ProductItem::class, 'product_item_id');
    }

    /**
     * Get the user who created the cart item.
     */
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
            ->logOnly(['product_item_id', 'quantity', 'creator_id'])
            ->useLogName('cart_item')
            ->logOnlyDirty();
    }
}
