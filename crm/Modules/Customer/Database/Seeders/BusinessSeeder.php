<?php

namespace Modules\Customer\Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $businesses = [
            ['name' => 'سوپرمارکت'],
            ['name' => 'نانوایی'],
            ['name' => 'رستوران'],
            ['name' => 'کافی‌شاپ'],
            ['name' => 'قصابی'],
            ['name' => 'میوه‌فروشی'],
            ['name' => 'پوشاک'],
            ['name' => 'آرایشگاه'],
            ['name' => 'تعمیرات موبایل'],
            ['name' => 'لوازم خانگی'],
            ['name' => 'داروخانه'],
            ['name' => 'خشکشویی'],
            ['name' => 'فروشگاه آنلاین'],
        ];

        foreach ($businesses as $business) {
            DB::table('businesses')->insert([
                'name' => $business['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
