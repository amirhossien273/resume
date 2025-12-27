<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Transaction\App\Enums\ResponsibleStatusEnum;
use Modules\Transaction\App\Enums\ShareTypeEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('responsibles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id');
            $table->string('model_type');
            $table->unsignedBigInteger('transaction_id');
            $table->enum(
                'share_type',
                ShareTypeEnum::values()
            )->default(ShareTypeEnum::PERCENT->value);
            $table->decimal('share_value', 12, 2)
                ->nullable();
            $table->enum(
                'status',
                ResponsibleStatusEnum::values()
            )->default(ResponsibleStatusEnum::PENDING->value);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsibles');
    }
};
