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
        Schema::table('transactions', function (Blueprint $table) {
            // دلیل ناموفق شدن (FK به failed_reasons)
            $table->unsignedBigInteger('failed_reason_id')
                ->nullable()
                ->after('status');

            // توضیحات تکمیلی
            $table->text('failed_description')
                ->nullable()
                ->after('failed_reason_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {

            $table->dropColumn([
                'failed_reason_id',
                'failed_description',
            ]);
        });
    }
};
