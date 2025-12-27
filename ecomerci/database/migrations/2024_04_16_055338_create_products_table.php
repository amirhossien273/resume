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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("unique_id")->unique()->nullable();
            $table->string("title");
            $table->string("slug");
            $table->longText("content")->nullable();
            $table->longText("intro")->nullable();
            $table->enum("state_enum", ['DRAFT','PENDING','APPROVED','REJECTED']);
            $table->unsignedBigInteger("creator_id")->nullable();
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger("category_id")->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->bigInteger("show_order");
            $table->boolean("is_active")->default(true);
            $table->boolean('is_show_first_page')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
