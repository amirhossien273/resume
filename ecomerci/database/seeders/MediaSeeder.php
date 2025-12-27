<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('seeders/data/media.json'));
        $data = json_decode($json, true);

        $json_media_collections = File::get(database_path('seeders/data/media_collections.json'));
        $data_media_collections = json_decode($json_media_collections, true);

        $json_media_collection_media = File::get(database_path('seeders/data/media_collection_media.json'));
        $data_media_collection_media = json_decode($json_media_collection_media, true);

        $json_media_mediables = File::get(database_path('seeders/data/media_mediables.json'));
        $data_media_mediables = json_decode($json_media_mediables, true);

        DB::table('media')->insert($data);

        DB::table('media_collections')->insert($data_media_collections);

        DB::table('media_collection_media')->insert($data_media_collection_media);

        DB::table('media_mediables')->insert($data_media_mediables);
    }
}
