<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('flowable_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flowable_id')->constrained('flowables')->cascadeOnDelete();
            $table->foreignId('step_id')->constrained('flow_steps')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->unsignedBigInteger('task_id');
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('flowable_histories');
    }
};
