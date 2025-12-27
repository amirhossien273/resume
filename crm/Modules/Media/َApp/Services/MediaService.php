<?php
namespace Modules\Media\َApp\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;

class MediaService
{
    protected $disk;

    public function __construct()
    {
        $this->disk = Storage::disk('s3'); // حالا مستقیم S3
    }

    public function uploadToTemp(UploadedFile $file, int $userId): string
    {
        $timestamp = now()->timestamp;
        $extension = $file->getClientOriginalExtension();
        $fileName = "{$timestamp}_{$userId}.{$extension}";
        $path = "temp_media/{$fileName}";

        $file->storeAs('temp_media', $fileName, 's3');

        return $path;
    }

    public function cleanOldTempFiles(int $minutes = 30): void
    {
        $threshold = now()->subMinutes($minutes);
        $files = $this->disk->files('temp_media');

        foreach ($files as $file) {
            $lastModified = Carbon::createFromTimestamp($this->disk->lastModified($file));
            if ($lastModified->lt($threshold)) {
                $this->disk->delete($file);
            }
        }
    }

    public function cleanOldTempFilesIfDue(int $minutes = 5): void
    {
        $lastRun = cache()->get('media_cleanup_last_run');

        if (!$lastRun || now()->diffInMinutes($lastRun) >= $minutes) {
            $this->cleanOldTempFiles($minutes);
            cache()->put('media_cleanup_last_run', now());
        }
    }

    public function moveToFinal(string $tempPath, string $finalDir): string
    {
        $fileName = basename($tempPath);
        $finalPath = "{$finalDir}/{$fileName}";

        $this->disk->move($tempPath, $finalPath);

        return $finalPath; // مسیر S3
    }
}
