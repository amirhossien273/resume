<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('flowables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flow_id')->constrained('flows')->cascadeOnDelete();
            $table->morphs('src'); // src_id + src_type
            $table->foreignId('current_step_id')->nullable()->constrained('flow_steps')->nullOnDelete();
            $table->string('status')->default('active'); // active, completed, canceled
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void {
        Schema::dropIfExists('flowables');
    }
};
