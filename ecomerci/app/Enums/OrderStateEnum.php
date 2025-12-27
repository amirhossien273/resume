<?php

namespace App\Enums;

enum OrderStateEnum: string
{
     case INITIALIZED   = 'INITIALIZED';
     case USER_TIMEOUT  = 'USER_TIMEOUT';
     case PENDING       = 'PENDING';
     case CONFIRMED     = 'CONFIRMED';
     case CANCELLED     = 'CANCELLED';
     case READY_TO_SHIP = 'READY_TO_SHIP';
     case SHIPPED       = 'SHIPPED';
     case DELIVERED     = 'DELIVERED';

     /**
     * Get the Persian (Farsi) translation for a given order state.
     *
     * @param string $state The English state.
     * @return string The Persian translation of the state.
     */
     public static function getPersianTranslation(string $state): string
     {
         $translations = [
             self::INITIALIZED->value   => 'آغاز شده',
             self::USER_TIMEOUT->value  => 'پایان زمان کاربر',
             self::PENDING->value       => 'در انتظار',
             self::CONFIRMED->value     => 'تایید شده',
             self::CANCELLED->value     => 'لغو شده',
             self::READY_TO_SHIP->value => 'آماده ارسال',
             self::SHIPPED->value       => 'ارسال شده',
             self::DELIVERED->value     => 'تحویل داده شده',
         ];
 
         return $translations[$state] ?? 'نامشخص';
     }
}
