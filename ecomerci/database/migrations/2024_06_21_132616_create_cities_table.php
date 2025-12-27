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
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 30);
            $table->string('slug', 30);
            $table->integer('show_order')->nullable();
            $table->double('latitude', 11, 8)->nullable();
            $table->double('longitude', 11, 8)->nullable();
            $table->string('phone_code', 3)->nullable();
            $table->unsignedBigInteger('province_id')->nullable();
            $table->longText('payload')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();

            $table->foreign('province_id')->references('id')->on('provinces')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
