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
        Schema::create('attribute_options', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->unsignedBigInteger("attribute_id");
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
            $table->string("is_active")->default(true);
            $table->integer("show_order");
            $table->unsignedBigInteger("creator_id");
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_options');
    }
};
