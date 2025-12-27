<?php

return [

    /*
    |--------------------------------------------------------------------------
    | The default disk where files should be uploaded
    |--------------------------------------------------------------------------
    |
    */

    'disk' => 'media',

    /*
    |--------------------------------------------------------------------------
    | The default collection name where files should reside.
    |--------------------------------------------------------------------------
    |
    */

    'collection' => 'Default',

    /*
    |--------------------------------------------------------------------------
    | The queue that should be used to perform image conversions
    |--------------------------------------------------------------------------
    |
    | Leave empty to use the default queue driver.
    |
    */

    'queue' => null,


    /*
    |--------------------------------------------------------------------------
    | The fully qualified class name of the MediaMan models
    |--------------------------------------------------------------------------
    |
    */

    'models' => [
        'media'      => \Module\Media\Src\Models\Media::class,
        'collection' => \Module\Media\Src\Models\MediaCollection::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | The table names for MediaMan
    |--------------------------------------------------------------------------
    |
    */

    'tables' => [
        'media'            => 'media',
        'collections'      => 'media_collections',
        'collection_media' => 'media_collection_media',
        'mediables'        => 'media_mediables',
    ],

    /*
    |--------------------------------------------------------------------------
    | Accessibility Check Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration determines whether the package should perform an
    | accessibility check (i.e., write and delete) when ensuring the disk is
    | writable. If set to true, a temporary file will be created and deleted
    | to validate write permissions on the specified disk.
    |
    */

    'check_disk_accessibility' => env('MEDIAMAN_CHECK_DISK_ACCESSIBILITY', false),
];