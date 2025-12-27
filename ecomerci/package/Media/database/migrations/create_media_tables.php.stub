<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Collections table
        Schema::create(config('media.tables.collections'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });


        // Media table
        Schema::create(config('media.tables.media'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('disk');
            $table->string('name');
            $table->string('patch')->nullable();
            $table->string('file_name');
            $table->string('mime_type');
            $table->unsignedInteger('size');
            $table->json('data')->nullable();
            $table->timestamps();
        });


        // Collection & Media pivot table
        Schema::create(config('media.tables.collection_media'), function (Blueprint $table) {
            $table->unsignedBigInteger('collection_id')
                ->constraint(config('media.tables.collections'))
                ->cascadeOnDelete();

            $table->unsignedBigInteger('media_id')
                ->constraint(config('media.tables.media'))
                ->cascadeOnDelete();;

            $table->primary(['collection_id', 'media_id']);
        });


        // Mediable table
        Schema::create(config('media.tables.mediables'), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('media_id')->index();
            $table->unsignedBigInteger('mediable_id')->index();
            $table->string('mediable_type');
            $table->string('channel');

            $table->foreign('media_id')
                ->references('id')
                ->on(config('media.tables.media'))
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('media.tables.collection_media'));
        Schema::dropIfExists(config('media.tables.mediables'));
        Schema::dropIfExists(config('media.tables.collections'));
        Schema::dropIfExists(config('media.tables.media'));
    }
};