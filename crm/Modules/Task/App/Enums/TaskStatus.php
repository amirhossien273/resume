<?php

namespace Modules\Task\App\Enums;

enum TaskStatus: string
{
    case Pending = 'pending';
    case InProgress = 'in_progress';
    case Done = 'done';
    case Finished = 'finished';
    case Canceled = 'canceled';

    // متد برای نمایش فارسی
    public function label(): string
    {
        return match($this) {
            self::Pending => 'در انتظار',
            self::InProgress => 'درحال انجام',
            self::Done => 'انجام شده',
            self::Finished => 'پایان یافته',
            self::Canceled => 'لغو شده',
        };
    }

    public static function values(): array
    {
        return array_map(fn($e) => $e->value, self::cases());
    }

}
