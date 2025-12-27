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
        Schema::create('product_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->enum("state_enum", ['DRAFT','PENDING','APPROVED','REJECTED']);
            $table->string("reject_reason")->nullable();
            $table->integer("price");
            $table->integer("strikethrough_price")->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('consign_quantity')->nullable();
            $table->integer('total_quantity')->nullable();
            $table->integer('max_basket_limit')->nullable();
            $table->boolean('is_available')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_special')->default(false);
            $table->boolean('is_new')->default(false);
            $table->boolean('is_best_seller')->default(false);
            $table->boolean('is_on_sale')->default(false);
            $table->string('box')->nullable();
            $table->bigInteger('show_order')->default(false);
            $table->unsignedBigInteger("category_id")->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_items');
    }
};
