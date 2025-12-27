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

        Schema::table('customers', function (Blueprint $table) {

            if (Schema::hasColumn('customers', 'expert_id')) {
                $table->dropForeign('customers_expert_id_foreign');
                $table->dropColumn('expert_id');
            }

            $table->nullableMorphs('userable');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {

            $table->dropMorphs('userable');

        });
    }
};
