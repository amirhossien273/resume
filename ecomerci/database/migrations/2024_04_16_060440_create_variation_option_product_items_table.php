<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('variation_option_product_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_item_id");
            $table->foreign('product_item_id')->references('id')->on('product_items')->onDelete('cascade');
            $table->unsignedBigInteger("variation_option_id");
            $table->foreign('variation_option_id')->references('id')->on('variation_options')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variation_option_product_items');
    }
};
