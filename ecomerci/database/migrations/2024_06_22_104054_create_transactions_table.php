<?php

use App\Enums\TransactionStateEnum;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('payment_gateway_id');
            $table->integer('price');
            $table->longText('bank_data');
            $table->enum('agent', ['MOBILE', 'FRONT'])->nullable();
            $table->string('res_number', 191);
            $table->string('ref_number', 191)->nullable()->comment('coming from bank');
            $table->string('trace_number', 191)->nullable()->comment('coming from bank');
            $table->string('card_code', 191)->nullable()->comment('coming from bank');
            $table->string('gateway_state', 191)->nullable()->comment('coming from bank');
            $table->string('gateway_status', 191)->nullable()->comment('coming from bank');
            $table->enum('state_enum', array_column(TransactionStateEnum::cases(), 'value'))->nullable();
            $table->string('ip', 45);
            $table->timestamp('succeeded_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade');
            $table->foreign('payment_gateway_id')->references('id')->on('payment_gateways')->onUpdate('cascade');
            $table->foreign('creator_id')->references('id')->on('users')->onUpdate('cascade');
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
