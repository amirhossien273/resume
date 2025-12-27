<?php

namespace Module\Media\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MediaPublishMigrationCommand extends Command
{
    protected $signature = 'media:publish-migration';

    protected $description = 'Publish Mediaman Migration';

    public function handle()
    {
        $this->publishMigration();
    }

    protected function publishMigration()
    {
        $existingMigration = $this->getExistingMigration();
        if ($existingMigration) {
            $this->info('Found media migration: ' . $existingMigration);
            if (!$this->confirm('The media migration file already exists. Do you want to overwrite it?')) {
                $this->info('Config file was not overwritten.');
                return;
            }
        }

        $sourcePath = __DIR__ . '/../../database/migrations/create_media_tables.php.stub';
        $targetPath = $existingMigration ?: database_path('migrations/' . date('Y_m_d_His', time()) . '_create_media_tables.php');
        File::copy($sourcePath, $targetPath);

        $relativePath = str_replace(base_path() . '/', '', $targetPath);
        $this->info('Migration published to: ' . $relativePath);
    }

    protected function getExistingMigration()
    {
        $allFiles = File::files(database_path('migrations'));
        foreach ($allFiles as $file) {
            if (str_ends_with($file->getFilename(), '_create_media_tables.php')) {
                return $file->getPathname();
            }
        }

        return null;
    }
}