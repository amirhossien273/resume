<?php

namespace Module\Voucher\Src\Models;

use Illuminate\Database\Eloquent\Model;

class VoucherUsage extends Model
{
    protected $fillable = [
        'voucher_id', 'usage_type', 'usage_id', 'order_type', 'order_id'
    ];
}