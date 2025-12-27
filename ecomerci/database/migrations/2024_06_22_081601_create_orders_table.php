<?php

use App\Enums\OrderShipmentEnum;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("unique_id")->unique()->nullable();
            $table->integer('final_price')->nullable()->comment('total_price + shipping_price - total_discount_price');
            $table->integer('total_price')->nullable()->comment('sum cart_items total_price without discount');
            $table->integer('total_discount_price')->nullable()->comment('sum cart_items total_discount + voucher_price');
            $table->integer('total_count')->nullable();
            $table->integer('shipping_price')->nullable();
            $table->timestamp('invoiced_at')->nullable();
            $table->timestamp('shipped_at')->nullable();
            $table->enum('shipment', array_column(OrderShipmentEnum::cases(), 'value'))->default(OrderShipmentEnum::POST->value);
            $table->string('post_tracking_code', 191)->nullable();
            $table->longText('post_response')->nullable();
            $table->longText('post_param')->nullable();
            $table->boolean('is_dropshipp')->default(false);
            $table->text('note')->comment('extra details and demands from user')->nullable();
            $table->text('note_manage')->comment('Admin notes on order')->nullable();
            $table->enum('state_enum', array_column(OrderStateEnum::cases(), 'value'))->default(OrderStateEnum::INITIALIZED->value);
            $table->longText('address');
            $table->unsignedBigInteger('reordered_id')->nullable();
            $table->longText('voucher')->nullable();
            $table->integer('voucher_price')->nullable();
            $table->unsignedBigInteger('voucher_id')->nullable();
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('creator_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('reordered_id')->references('id')->on('orders')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
