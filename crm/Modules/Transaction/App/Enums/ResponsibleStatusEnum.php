<?php

namespace Modules\Transaction\App\Enums;

enum ResponsibleStatusEnum: string
{
    case PENDING = 'pending';
    case ACCEPTED  = 'accepted';
    case REJECTED  = 'rejected';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'در انتظار',
            self::ACCEPTED  => 'تایید شده',
            self::REJECTED  => 'رد شده',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
