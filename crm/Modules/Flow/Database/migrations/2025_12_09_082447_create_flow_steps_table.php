<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('flow_steps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flow_id')->constrained('flows')->cascadeOnDelete();
            $table->string('name');
            $table->integer('order')->default(1);
            $table->string('type')->nullable(); // مثل approval, review, verification
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('flow_steps');
    }
};
