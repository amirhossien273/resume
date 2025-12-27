<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Traits\FarsiSlug;
use Illuminate\Console\Command;

class RebuildProductSlugs extends Command
{
    use FarsiSlug;

    protected $signature = 'products:rebuild-slugs';
    protected $description = 'Rebuild all product slugs from their titles';

    public function handle()
    {
        $this->info('Starting to rebuild product slugs...');
        
        $products = Product::all();
        $bar = $this->output->createProgressBar(count($products));
        
        foreach ($products as $product) {
            $product->slug = $this->createFarsiSlug($product->title);
            $product->save();
            $bar->advance();
        }
        
        $bar->finish();
        $this->newLine();
        $this->info('Successfully rebuilt all product slugs!');
    }
} 