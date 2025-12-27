<?php
namespace Modules\Media\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
class Media extends Model
{
    use SoftDeletes;

    protected $table = 'medias';

    protected $fillable = ['name', 'path', 'type'];

    public function fileable()
    {
        return $this->morphTo();
    }

    public function url()
    {
        return Storage::disk('s3')->url($this->path);
    }
}
