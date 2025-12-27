<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class VariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('seeders/data/variations.json'));
        $data = json_decode($json, true);
        DB::table('variations')->insert($data);

        $json = File::get(database_path('seeders/data/variation_options.json'));
        $data = json_decode($json, true);
        DB::table('variation_options')->insert($data);
    }
}
