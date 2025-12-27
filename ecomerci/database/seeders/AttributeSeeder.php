<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('seeders/data/attributes.json'));
        $data = json_decode($json, true);
        DB::table('attributes')->insert($data);

        $json = File::get(database_path('seeders/data/attribute_options.json'));
        $data = json_decode($json, true);
        DB::table('attribute_options')->insert($data);
    }
}
