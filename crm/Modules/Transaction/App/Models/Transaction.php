<?php

namespace Modules\Transaction\App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Http\Request;
use Modules\Invoice\App\Models\Invoice;
use Modules\Transaction\App\Enums\ShareTypeEnum;
use Modules\Transaction\Database\factories\TransactionFactory;
use Modules\Auth\App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Task\App\Models\Task;
use Morilog\Jalali\CalendarUtils;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'amount',
        'approximate_amount',
        'payment_method',
        'type_id',
        'status',
        'description',
        'creator_id',
        'creator_type',
        'customer_id',
        'customer_type',
        'product_id',
        'product_type',
        'failed_reason_id',
        'failed_description',
        'deal_closed_at'
    ];

    protected $casts = [
        'deleted_at'     => 'datetime',
        'share_type' => ShareTypeEnum::class,
    ];

    const PAYMENT_METHODS = [
        'cash' => 'Cash',
        'card' => 'Card',
        'online' => 'Online',
    ];

    const STATUS = [
        'running' => 'در حال اجرا',
        'success' => 'موفق',
        'failed' => 'ناموفق',
    ];

    protected $appends = ['status_key','invoice_id', 'status_color'];

    protected $with = ['customer'];

    public function tasks()
    {
        return $this->morphMany(Task::class, 'src', 'src_type', 'src_id');
    }

    public function getInvoiceIdAttribute(): ?int
    {
        return $this->invoices()->first()?->id;
    }

    public function creator()
    {
        return $this->morphTo("creator", 'creator_type', 'creator_id');
    }

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class, 'type_id');
    }

    public function customer()
    {
        return $this->morphTo("customer", 'customer_type', 'customer_id');
    }
    public function flowable()
    {
        return $this->morphOne(\Modules\Flow\App\Models\Flowable::class, 'src');
    }
    public function responsibles()
    {
        return $this->hasMany(Responsible::class, 'transaction_id');
    }

    public function product()
    {
        return $this->morphTo("product", 'product_type', 'product_id');
    }

    protected function paymentMethod(): Attribute
    {
        return Attribute::make(
            get: fn($value) => self::PAYMENT_METHODS[$value] ?? $value,
        );
    }

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn($value) => self::STATUS[$value] ?? $value,
        );
    }

    public function getStatusKeyAttribute(): string
    {
        return self::STATUS[$this->status];
    }

    public function getStatusColorAttribute()
    {
        $colors = [
            'running' => ' btn-info',
            'success' => ' btn-success',
            'failed'  => ' btn-danger',
        ];
        return $colors[$this->status] ?? 'bg-gray-200 text-gray-800';
    }
    public function invoices(): MorphMany
    {
        return $this->morphMany(Invoice::class, 'src');
    }

    public function failedReason()
    {
        return $this->belongsTo(TransactionFailedReason::class, 'failed_reason_id');
    }
    public function scopeApplyFilters($query, Request $request)
    {
        return $query
            ->when($request->filled('status'), fn ($q) =>
            $q->where('status', $request->status)
            )
            ->when($request->filled('from'), function ($q) use ($request) {
                // تبدیل شمسی به میلادی
                [$gy, $gm, $gd] = CalendarUtils::toGregorian(...explode('-', $request->from));
                $q->whereDate('created_at', '>=', "$gy-$gm-$gd");
            })
            ->when($request->filled('to'), function ($q) use ($request) {
                [$gy, $gm, $gd] = CalendarUtils::toGregorian(...explode('-', $request->to));
                $q->whereDate('created_at', '<=', "$gy-$gm-$gd");
            });
    }

}
