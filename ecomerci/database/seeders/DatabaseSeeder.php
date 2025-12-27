<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class,
            PaymentGatewaySeeder::class,
            SliderSeeder::class,
            BannerSeeder::class,
            CategorySeeder::class,
            AttributeSeeder::class,
            VariationSeeder::class,
            TagSeeder::class,
            ProductSeeder::class,
            MediaSeeder::class

        ]);



    }
}
