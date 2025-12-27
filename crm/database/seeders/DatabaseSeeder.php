<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Auth\Database\Seeders\SeedFakeAuthUsersSeeder;
use Modules\Customer\Database\Seeders\CustomerDatabaseSeeder;
use Modules\Task\Database\Seeders\TaskTitleSeeder;
use Modules\Transaction\Database\Seeders\TransactionFailedReasonSeeder;
use Modules\Transaction\Database\Seeders\TransactionTypeSeeder;
use Modules\Flow\Database\Seeders\FlowSeeder;
use Modules\Product\Database\Seeders\ProductSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CustomerDatabaseSeeder::class,
            TransactionTypeSeeder::class,
            SeedFakeAuthUsersSeeder::class,
            ProductSeeder::class,
            FlowSeeder::class,
            TaskTitleSeeder::class,
            TransactionFailedReasonSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
