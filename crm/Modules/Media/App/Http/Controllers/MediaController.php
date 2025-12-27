<?php

namespace Modules\Media\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Media\َApp\Services\MediaService;


class MediaController extends Controller
{
    protected $media;

    public function __construct(MediaService $media)
    {
        $this->media = $media;
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240',
            'fileable_type' => 'required|string',
            'fileable_id' => 'required|integer',
        ]);

        $path = $this->media->uploadToTemp($request->file('file'), auth()->id());

        $fileableClass = $request->fileable_type;
        $fileable = $fileableClass::findOrFail($request->fileable_id);

        $file = $fileable->files()->create([
            'name' => $request->file('file')->getClientOriginalName(),
            'path' => $path,
            'type' => $request->file('file')->getClientMimeType(),
        ]);

        return response()->json([
            'message' => 'File uploaded successfully',
            'file_url' => $file->url(),
        ]);
    }
}
