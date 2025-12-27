<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('customers', function (Blueprint $table) {

            $table->string('firstname')->after('id');
            $table->string('lastname')->after('firstname');
            $table->dropColumn('name');

            $table->enum('status', ['actual', 'potential'])->default('potential')->after('email');
            $table->enum('type', ['person', 'company'])->default('person')->after('status');

            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->dropColumn(['firstname', 'lastname']);

            $table->dropColumn('type');
            $table->dropColumn('status');
            $table->dropColumn('province_id');
            $table->dropColumn('city_id');
        });
    }
};
