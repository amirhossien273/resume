<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Read the JSON file
        $json = File::get(database_path('seeders/data/provinces.json'));

        // Decode the JSON data into an array
        $data = json_decode($json, true);

        // Insert data into the provinces table
        DB::table('provinces')->insert($data);
    }
}
