<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_id','order', 'model_type', 'type', 'file_path', 'file_name', 'file_size', 'file_extension'
    ];

    public function model()
    {
        return $this->morphTo();
    }
}
