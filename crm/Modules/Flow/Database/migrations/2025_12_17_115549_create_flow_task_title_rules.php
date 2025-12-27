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
        Schema::create('flow_task_title_rules', function (Blueprint $table) {
            $table->id();

            $table->foreignId('flow_id')->constrained('flows')->cascadeOnDelete();
            $table->foreignId('task_title_id')->constrained('task_titles')->cascadeOnDelete();

            $table->foreignId('from_step_id')->nullable()
                ->constrained('flow_steps')->nullOnDelete();

            $table->foreignId('to_step_id')->nullable()
                ->constrained('flow_steps')->nullOnDelete();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index(['flow_id', 'task_title_id']);
            $table->unique(
                ['flow_id', 'task_title_id', 'from_step_id'],
                'flow_title_fromstep_unique'
            );
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flow_task_title_rules');
    }

};
