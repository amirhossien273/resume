<?php

namespace Modules\Transaction\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionFailedReasonSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('transaction_failed_reasons')->insert([
            [
                'title' => 'عدم پاسخگویی مشتری',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'قیمت مورد تأیید مشتری نبود',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'انتخاب رقیب',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'لغو توسط مشتری',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'سایر دلایل',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
