<?php
namespace Modules\Ticket\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Auth\App\Models\User;
use Modules\Media\App\Traits\HasMedia;

class Ticket extends Model
{
    use SoftDeletes, HasMedia;

    /* ================= FILLABLE ================= */

    protected $fillable = [
        'subject',
        'description',
        'status',
        'type',
        'priority',
        'ticketable_id',
        'ticketable_type',
        'created_by',
        'assigned_to'
    ];

    protected $appends = [
        'status_label',
        'priority_label',
        'type_label',
    ];
    /* ================= ENUM VALUES ================= */

    public const STATUSES = [
        'open'        => 'باز',
        'in_progress' => 'در حال بررسی',
        'closed'      => 'بسته شده',
    ];

    public const PRIORITIES = [
        'low'    => 'کم',
        'medium' => 'متوسط',
        'high'   => 'زیاد',
    ];

    public const TYPES = [
        'support'        => 'پشتیبانی',
        '' => '',
    ];

    /* ================= RELATIONS ================= */

    public function ticketable()
    {
        return $this->morphTo();
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
    /* ================= ACCESSORS ================= */

    public function getStatusLabelAttribute(): string
    {
        return self::STATUSES[$this->status] ?? 'نامشخص';
    }

    public function getPriorityLabelAttribute(): string
    {
        return self::PRIORITIES[$this->priority] ?? 'نامشخص';
    }

    public function getTypeLabelAttribute(): string
    {
        return self::TYPES[$this->type] ?? 'نامشخص';
    }
    /* ================= HELPERS ================= */

    public static function statuses(): array
    {
        return self::STATUSES;
    }

    public static function priorities(): array
    {
        return self::PRIORITIES;
    }

    public static function types(): array
    {
        return self::TYPES;
    }

    public static function statusKeys(): array
    {
        return array_keys(self::STATUSES);
    }

    public static function priorityKeys(): array
    {
        return array_keys(self::PRIORITIES);
    }

    public static function typeKeys(): array
    {
        return array_keys(self::TYPES);
    }
}
