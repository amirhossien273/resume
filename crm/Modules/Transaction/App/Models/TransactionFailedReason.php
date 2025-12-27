<?php

namespace Modules\Transaction\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionFailedReason extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['title', 'is_active'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'failed_reason_id');
    }
}
