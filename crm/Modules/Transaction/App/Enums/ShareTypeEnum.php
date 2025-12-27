<?php

namespace Modules\Transaction\App\Enums;

enum ShareTypeEnum: string
{
    case PERCENT = 'percent';
    case AMOUNT  = 'amount';

    public function label(): string
    {
        return match ($this) {
            self::PERCENT => 'درصدی',
            self::AMOUNT  => 'مبلغ ثابت',
        };
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
