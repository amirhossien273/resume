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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('src_id')->nullable();
            $table->string('src_type')->nullable();

            $table->string('title_id');
            $table->text('description')->nullable();
            $table->enum('status', ['pending','in_progress','done','finished','canceled'])->default('pending');

            $table->string('due_date')->nullable();
            $table->time('task_time')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
