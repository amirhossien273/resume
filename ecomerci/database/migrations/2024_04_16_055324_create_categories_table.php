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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("slug");
            $table->longText("content")->nullable();
            $table->boolean("is_active")->default(true);
            $table->unsignedBigInteger("creator_id")->nullable();
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger("show_order");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
