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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('شناسه یکتا برای هر ووچر');
            $table->string('title')->comment('عنوان ووچر');
            $table->text('content')->comment('توضیحات ووچر');
            $table->string('code')->unique()->comment('کد اختصاصی ووچر');
            $table->dateTime('start_at')->comment('تاریخ و ساعت شروع اعتبار ووچر');
            $table->dateTime('end_at')->comment('تاریخ و ساعت پایان اعتبار ووچر');
            $table->decimal('discount_price', 10, 2)->nullable()->comment('مقدار تخفیف ثابت به واحد ارز');
            $table->tinyInteger('discount_percent')->nullable()->comment('درصد تخفیف (عدد بین 0 تا 100)');
            $table->integer('usage_limit')->default(1)->comment('محدودیت تعداد استفاده');
            $table->decimal('min_cart_price', 10, 2)->nullable()->comment('حداقل مبلغ خرید برای استفاده از ووچر');
            $table->decimal('max_discount', 10, 2)->nullable()->comment('سقف تخفیف برای درصدی‌ها');
            $table->boolean('is_reusable')->default(false)->comment('آیا ووچر قابل استفاده مجدد است؟');
            $table->boolean('is_first_order')->default(false)->comment('آیا فقط برای اولین سفارش قابل استفاده است؟');
            $table->boolean('is_free_shipping')->default(false)->comment('آیا ارسال رایگان را شامل می‌شود؟');
            $table->boolean('is_active')->default(true)->comment('وضعیت فعال/غیرفعال بودن ووچر');
            $table->unsignedBigInteger('creator_id')->comment('شناسه کاربری ایجاد کننده ووچر');
            $table->timestamps();
            $table->softDeletes();
        });


        // Media table
        Schema::create('voucherable', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('voucher_id');
            $table->string('voucherable_type');
            $table->unsignedBigInteger('voucherable_id');
            $table->timestamps();
        });

        Schema::create('voucher_usage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('voucher_id');
            $table->string('usage_type');
            $table->unsignedBigInteger('usage_id');
            $table->string('order_type');
            $table->unsignedBigInteger('order_id');
            $table->timestamps();
        });

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
        Schema::dropIfExists('voucherable');
    }
};