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
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 191)->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->double('latitude', 11, 8)->nullable();
            $table->double('longitude', 11, 8)->nullable();
            $table->text('content');
            $table->smallInteger('no');
            $table->string('unit', 191)->nullable();
            $table->string('postal_code', 191);
            $table->string('first_name', 191)->nullable();
            $table->string('last_name', 191)->nullable();
            $table->string('phone', 191)->nullable();
            $table->string('mobile', 191)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
