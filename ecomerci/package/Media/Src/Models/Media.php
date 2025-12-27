<?php

namespace Module\Media\Src\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Collection as BaseCollection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Module\Media\Src\Casts\Json;

class Media extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'file_name', 'patch', 'mime_type', 'size', 'disk', 'data'
    ];

    /**
     * The attributes that need casting.
     *
     * @var array
     */
    protected $casts = [
        'data' => Json::class
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['friendly_size',  'media_uri', 'media_url', 'type', 'extension'];


    public static function booted()
    {
        static::deleted(static function ($media) {
            // delete the media directory
            $deleted = Storage::disk($media->disk)->deleteDirectory($media->getDirectory($media->patch));
            // if failed, try deleting the file then
            !$deleted && Storage::disk($media->disk)->delete($media->getPath());
        });

        static::updating(function ($media) {
            // If the disk attribute is changed, validate the new disk usability
            if ($media->isDirty('disk')) {
                $newDisk = $media->disk; // updated disk
                self::ensureDiskUsability($newDisk);
            }
        });

        static::updated(function ($media) {
            $originalDisk = $media->getOriginal('disk');
            $newDisk = $media->disk;

            $originalFileName = $media->getOriginal('file_name');
            $newFileName = $media->file_name;

            $path = $media->getDirectory($media->patch);

            // If the disk has changed, move the file to the new disk first
            if ($media->isDirty('disk')) {
                $filePathOnOriginalDisk = $path . '/' . $originalFileName;
                $fileContent = Storage::disk($originalDisk)->get($filePathOnOriginalDisk);

                // Store the file to the new disk
                Storage::disk($newDisk)->put($filePathOnOriginalDisk, $fileContent);

                // Delete the original file
                Storage::disk($originalDisk)->delete($filePathOnOriginalDisk);
            }

            // If the filename has changed, rename the file on the disk it currently resides
            if ($media->isDirty('file_name')) {
                // Rename the file in the storage
                Storage::disk($newDisk)->move($path . '/' . $originalFileName, $path . '/' . $newFileName);
            }
        });
    }

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public function getTable()
    {
        return config('media.tables.media');
    }

    /**
     * Get the file extension.
     *
     * @return string
     */
    public function getExtensionAttribute()
    {
        return pathinfo($this->file_name, PATHINFO_EXTENSION);
    }

    /**
     * Get the file type.
     *
     * @return string|null
     */
    public function getTypeAttribute()
    {
        return Str::before($this->mime_type, '/') ?? null;
    }

    /**
     * Determine if the file is of the specified type.
     *
     * @param string $type
     * @return bool
     */
    public function isOfType(string $type)
    {
        return $this->type === $type;
    }

    /**
     * Get the file size in human readable format.
     *
     * @return string|null
     */
    public function getFriendlySizeAttribute()
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        if ($this->size == 0) {
            return '0 ' . $units[1];
        }

        for ($i = 0; $this->size > 1024; $i++) {
            $this->size /= 1024;
        }

        return round($this->size, 2) . ' ' . $units[$i];
    }

    /**
     * Get the original media url.
     *
     * @return string
     */
    public function getMediaUrlAttribute()
    {
        return asset($this->filesystem()->url($this->getPath()));
    }

    /**
     * Get the original media uri.
     *
     * @return string
     */
    public function getMediaUriAttribute()
    {
        return $this->filesystem()->url($this->getPath());
    }

    /**
     * Get the url to the file.
     *
     * @param string $conversion
     * @return mixed
     */
    public function getUrl(string $conversion = '')
    {
        return $this->filesystem()->url(
            $this->getPath($conversion)
        );
    }

    /**
     * Get the full path to the file.
     *
     * @param string $conversion
     * @return mixed
     */
    public function getFullPath(string $conversion = '')
    {
        return $this->filesystem()->path(
            $this->getPath($conversion)
        );
    }

    /**
     * Get the path to the file on disk.
     *
     * @param string $conversion
     * @return string
     */
    public function getPath(string $conversion = '')
    {
        $directory = $this->getDirectory($this->patch);

        if ($conversion) {
            $directory .= '/conversions/' . $conversion;
        }

        return $directory . '/' . $this->file_name;
    }

    /**
     * Get the directory for files on disk.
     *
     * @return mixed
     */
    public function getDirectory($patch)
    {
        return $patch . '/' . $this->getKey() . '-' . md5($this->getKey() . config('app.key'));
    }

    /**
     * Get the filesystem where the associated file is stored.
     *
     * @return Filesystem
     */
    public function filesystem()
    {
        return Storage::disk($this->disk);
    }


    /**
     * Find a media by media name
     *
     * @param $query
     * @param string $names
     * @param array $columns
     * @return Collection|Media|null
     */
    public  function scopeFindByName($query, $names, array $columns = ['*'])
    {
        if (is_array($names)) {
            return $query->select($columns)->whereIn('name', $names)->get();
        }

        return $query->select($columns)->where('name', $names)->first();
    }


    /**
     * A media belongs to many collection
     *
     * @return BelongsToMany
     */
    public function collections(): BelongsToMany
    {
        return $this->belongsToMany(MediaCollection::class, config('media.tables.collection_media'), 'collection_id', 'media_id');
    }
}