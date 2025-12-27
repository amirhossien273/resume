<?php

namespace Module\Voucher\console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class VoucharPublishMigrationCommand extends Command
{
    protected $signature = 'voucher:publish-migration';

    protected $description = 'Publish voucher Migration';

    public function handle()
    {
        $this->publishMigration();
    }

    protected function publishMigration()
    {
        $existingMigration = $this->getExistingMigration();
        if ($existingMigration) {
            $this->info('Found voucher migration: ' . $existingMigration);
            if (!$this->confirm('The voucher migration file already exists. Do you want to overwrite it?')) {
                $this->info('Config file was not overwritten.');
                return;
            }
        }

        $sourcePath = __DIR__ . '/../database/create_voucher_tables.php';
        $targetPath = $existingMigration ?: database_path('migrations/' . date('Y_m_d_His', time()) . '_create_voucher_tables.php');
        File::copy($sourcePath, $targetPath);

        $relativePath = str_replace(base_path() . '/', '', $targetPath);
        $this->info('Migration published to: ' . $relativePath);
    }

    protected function getExistingMigration()
    {
        $allFiles = File::files(database_path('migrations'));
        foreach ($allFiles as $file) {
            if (str_ends_with($file->getFilename(), '_create_voucher_tables.php')) {
                return $file->getPathname();
            }
        }

        return null;
    }
}
