<?php

namespace Modules\Task\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Task\App\Models\TaskTitle;

class TaskTitleSeeder extends Seeder
{
    public function run(): void
    {
        $titles = [
            ['title' => ' تماس اولیه', 'is_active' => true],
            ['title' => 'تماس پیگیری', 'is_active' => true],
            ['title' => 'تماس ورودی', 'is_active' => true],
            ['title' => 'جلسه', 'is_active' => true],
            ['title' => 'وظیفه', 'is_active' => true],
            ['title' => 'چت', 'is_active' => true],
            ['title' => 'موعد پرداخت', 'is_active' => true],
            ['title' => 'ارسال کاتالوگ', 'is_active' => true],
            ['title' => 'لیست قیمت', 'is_active' => true],
            ['title' => 'واریزوجه/دریافت چک', 'is_active' => true],
            ['title' => 'ارسال بار', 'is_active' => true],
            ['title' => 'تست دستگاه', 'is_active' => true],
            ['title' => 'ارسال بیجک', 'is_active' => true],
            ['title' => 'ورود دستگاه به بخش گارانتی', 'is_active' => true],
            ['title' => 'ارسال گارانتی برای مشتری', 'is_active' => true],
            ['title' => 'انتقال به بخش دستگاه خراب', 'is_active' => true],
            ['title' => 'شماره سند', 'is_active' => true],
            ['title' => 'تایید مدیر فروش', 'is_active' => true],
            ['title' => 'تایید حسابدار', 'is_active' => true],
            ['title' => 'ارچاع به انبار', 'is_active' => true],
            ['title' => 'ورود', 'is_active' => true],
            ['title' => 'خروج', 'is_active' => true],
            ['title' => 'ورود به انبار', 'is_active' => true],
            ['title' => 'اعتبار سنجی', 'is_active' => true],
            ['title' => 'نظرسنجی', 'is_active' => true],
            ['title' => 'انتقاد/پیشنهاد', 'is_active' => true],
            ['title' => 'آموزش اپلیکیشن', 'is_active' => true],
            ['title' => 'ویزیت حضوری', 'is_active' => true],

        ];

        foreach ($titles as $item) {
            TaskTitle::updateOrCreate(
                ['title' => $item['title']],
                ['is_active' => $item['is_active']]
            );
        }
    }
}
