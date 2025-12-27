<?php

namespace Modules\Flow\Database\Seeders;

use Illuminate\Database\Seeder;

class FlowDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(FlowSeeder::class);
    }
}
