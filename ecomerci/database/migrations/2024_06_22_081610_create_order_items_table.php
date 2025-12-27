<?php

use App\Enums\OrderItemStateEnum;
use App\Enums\OrderStateEnum;
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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('product_item_id')->nullable();
            $table->integer('requested_quantity')->default(1);
            $table->integer('sent_quantity')->nullable();
            $table->integer('approved_quantity')->nullable();
            $table->enum('state_enum', array_column(OrderItemStateEnum::cases(), 'value'))->default(OrderItemStateEnum::INITIALIZED->value);
            $table->string('product_title');
            $table->integer('product_unit_old_price')->nullable()->comment('qty * product_unit_old_price without discount');
            $table->integer('product_unit_price')->comment('product_total_price  - product_total_discount with discount');
            $table->integer('product_total_price')->comment('qty * product_unit_old_price without discount');
            $table->longText('product_variations')->nullable();
            $table->longText('product_images')->nullable();
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('creator_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade');
            $table->foreign('product_item_id')->references('id')->on('product_items')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
