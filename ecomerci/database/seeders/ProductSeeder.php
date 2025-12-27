<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductItem;
use App\Models\Tag;
use App\Models\Title;
use App\Models\VariationOption;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Module\Media\Src\MediaUploader;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(database_path('seeders/data/products.json'));
        $data = json_decode($json, true);
        DB::table('products')->insert($data);

        $json = File::get(database_path('seeders/data/attribute_option_products.json'));
        $data = json_decode($json, true);
        DB::table('attribute_option_products')->insert($data);
        
        $json = File::get(database_path('seeders/data/product_items.json'));
        $data = json_decode($json, true);
        DB::table('product_items')->insert($data);

        $json = File::get(database_path('seeders/data/variation_option_product_items.json'));
        $data = json_decode($json, true);
        DB::table('variation_option_product_items')->insert($data);
    }
}
