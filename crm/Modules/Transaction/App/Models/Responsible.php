<?php

namespace Modules\Transaction\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Transaction\Database\factories\ResponsibleFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Transaction\App\Models\Transaction;

class Responsible extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'model_id',
        'model_type',
        'role',
        'share_type',
        'share_value',
        'transaction_id'
    ];

    public function model()
    {
        return $this->morphTo();
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }


    public function calculateShare(Transaction $transaction)
    {
        if ($this->share_type === 'percent') {
            return ($transaction->amount * $this->share_value) / 100;
        }

        return $this->share_value;
    }

}
