<?php
namespace Modules\Media\App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Modules\Media\App\Models\Media;

trait HasMedia
{
    /**
     * آپلود یک فایل و ذخیره در جدول Medias
     * @param UploadedFile $file
     * @param string|null $folder مسیر پوشه داخل باکت
     */
    public function uploadMedia(UploadedFile $file, string $folder = null): Media
    {
        $disk = Storage::disk('s3');

        // اگر پوشه مشخص نشده، نام کلاس مدل را به عنوان پوشه استفاده کن
        if (!$folder) {
            $folder = strtolower(class_basename($this)) . 's'; // tickets، users، ...
        }

        // آپلود فایل در پوشه مشخص شده
        $path = $disk->putFile($folder, $file, 'public');

        /** @var Media $media */
        $media = $this->medias()->create([
            'name' => $file->getClientOriginalName(),
            'path' => $path,
            'type' => $file->getMimeType(),
        ]);

        return $media;
    }

    public function medias()
    {
        return $this->morphMany(Media::class, 'fileable');
    }

    public function getMediasWithUrlAttribute()
    {
        return $this->medias->map(function($media) {
            return [
                'id' => $media->id,
                'name' => $media->name,
                'type' => $media->type,
                'url' => $media->url(),
            ];
        });
    }

    public function deleteMedia(Media $media): bool
    {
        if ($media->fileable_type === get_class($this) && $media->fileable_id === $this->id) {
            Storage::disk('s3')->delete($media->path);
            $media->delete();
            return true;
        }
        return false;
    }
}
