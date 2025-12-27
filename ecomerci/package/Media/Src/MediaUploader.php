<?php

namespace Module\Media\Src;

use Illuminate\Http\UploadedFile;
use Module\Media\Src\Models\MediaCollection;

class MediaUploader
{
    /** @var UploadedFile */
    protected $file;

    /** @var string */
    protected $name;

    /** @var array */
    protected $collections = [];

    /** @var string */
    protected $fileName;

    /** @var string */
    protected $disk;

    /** @var string */
    protected $patch;

    /** @var string */
    protected $data = [];

    /**
     * Create a new uploader instance.
     *
     * @param UploadedFile $file
     * @return void
     */
    public function __construct(UploadedFile $file)
    {
        $this->setFile($file);
    }

    /**
     * @param UploadedFile $file
     * @return MediaUploader
     */
    public static function source(UploadedFile $file)
    {
        return new static($file);
    }

    /**
     * Set the file to be uploaded.
     *
     * @param UploadedFile $file
     * @return MediaUploader
     */
    public function setFile(UploadedFile $file)
    {
        $this->file = $file;

        $fileName = $file->getClientOriginalName();
        $name = pathinfo($fileName, PATHINFO_FILENAME);

        $this->setName($name);
        $this->setFileName($fileName);

        return $this;
    }

    /**
     * Set the name of the media item.
     *
     * @param string $name
     * @return MediaUploader
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $name
     * @return MediaUploader
     */
    public function useName(string $name)
    {
        return $this->setName($name);
    }

    /**
     * Set the name of the media item.
     *
     * @param string $name
     * @return MediaUploader
     */
    public function setCollection(string $name)
    {
        $this->collections[] = $name;

        return $this;
    }

    /**
     * @param string $name
     * @return MediaUploader
     */
    public function useCollection(string $name)
    {
        return $this->setCollection($name);
    }

    /**
     * @param string $name
     * @return MediaUploader
     */
    public function toCollection(string $name)
    {
        return $this->setCollection($name);
    }

    /**
     * Set the name of the file.
     *
     * @param string $fileName
     * @return MediaUploader
     */
    public function setFileName(string $fileName)
    {
        $this->fileName = $this->sanitizeFileName($fileName);

        return $this;
    }

    /**
     * @param string $fileName
     * @return MediaUploader
     */
    public function useFileName(string $fileName)
    {
        return $this->setFileName($fileName);
    }

    /**
     * Sanitize the file name.
     *
     * @param string $fileName
     * @return string
     */
    protected function sanitizeFileName(string $fileName)
    {
        return str_replace(['#', '/', '\\', ' '], '-', $fileName);
    }

    /**
     * Specify the disk where the file will be stored.
     *
     * @param string $disk
     * @return MediaUploader
     */
    public function setDisk(string $disk)
    {
        $this->disk = $disk;

        return $this;
    }

    /**
     * @param string $disk
     * @return MediaUploader
     */
    public function toDisk(string $disk)
    {
        return $this->setDisk($disk);
    }

    /**
     * @param string $disk
     * @return MediaUploader
     */
    public function useDisk(string $disk)
    {
        return $this->setDisk($disk);
    }

    /**
     * Specify the patch where the file will be stored.
     *
     * @param string $patch
     * @return MediaUploader
     */
    public function setPatch(string $patch)
    {
        $this->patch = $patch;

        return $this;
    }

    /**
     * @param string $patch
     * @return MediaUploader
     */
    public function toPatch(string $patch)
    {
        return $this->setPatch($patch);
    }

    /**
     * @param string $patch
     * @return MediaUploader
     */
    public function usePatch(string $patch)
    {
        return $this->setPatch($patch);
    }

    /**
     * Set any custom data to be saved to the media item.
     *
     * @param array $data
     * @return MediaUploader
     */
    public function withData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    public function useData(array $data)
    {
        return $this->withData($data);
    }

    /**
     * Upload the file to the specified disk.
     *
     * @return mixed
     */
    public function upload()
    {
        $model = config('media.models.media');

        $media = new $model();

        $media->name = $this->name;
        $media->file_name = $this->fileName . '.' . $this->file->getClientOriginalExtension();
        $media->disk = $this->disk ?: config('media.disk');
        $media->mime_type = $this->file->getMimeType();
        $media->patch = $this->patch;
        $media->size = $this->file->getSize();
        $media->data = $this->data;

        $media->save();

        $media->filesystem()->putFileAs(
            $media->getDirectory($media->patch),
            $this->file,
            $this->fileName . '.' . $this->file->getClientOriginalExtension(),
        );

        if (count($this->collections) > 0) {
            // todo: support multiple collections
            $collection = MediaCollection::firstOrCreate([
                'name' => $this->collections[0]
            ]);

            $media->collections()->attach($collection->id);
        } else {
            // add to the default collection
            // todo: allow not to add in the default collection
            $collection = MediaCollection::findByName(config('media.collection'));
            if ($collection) {
                $media->collections()->attach($collection->id);
            }
        }

        return $media;
    }
}