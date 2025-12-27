<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('amount', 15, 2)->nullable();
            $table->decimal('approximate_amount', 15, 2)->nullable();
            $table->enum('payment_method', ['cash', 'card', 'online'])->default('cash');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->string('creator_type')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('customer_type')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('product_type')->nullable();
            $table->string('deal_closed_at')->nullable();
            $table->enum('status', ['running', 'success', 'failed'])->default('running');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
