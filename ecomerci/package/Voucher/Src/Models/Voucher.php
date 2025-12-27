<?php

namespace Module\Voucher\Src\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Morilog\Jalali\Jalalian;


class Voucher extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'code', 'start_at', 'end_at', 'discount_price',
        'discount_percent', 'usage_limit', 'min_cart_price', 'max_discount',
        'is_reusable', 'is_first_order', 'is_free_shipping', 'is_active', 'creator_id'
    ];

    protected $dates = ['start_at', 'end_at'];

    public function isValid()
    {
        return $this->is_active && $this->start_at <= Jalalian::now() && $this->end_at >= Jalalian::now();
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

}