<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            // 'root' => storage_path('app'),
            'root' => public_path('uploads'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

        'promo' => [
            'driver' => 'local',
            'root' => storage_path('app/public/promo'),
            'url' => env('APP_URL').'/storage/promo',
            'visibility' => 'public',
            'throw' => false,
        ],

        'article' => [
            'driver' => 'local',
            'root' => storage_path('app/public/article'),
            'url' => env('APP_URL').'/storage/article',
            'visibility' => 'public',
            'throw' => false,
        ],

        'featured_games' => [
            'driver' => 'local',
            'root' => storage_path('app/public/featured_games'),
            'url' => env('APP_URL').'/storage/featured_games',
            'visibility' => 'public',
            'throw' => false,
        ],

        'carousel' => [
            'driver' => 'local',
            'root' => storage_path('app/public/carousel'),
            'url' => env('APP_URL').'/storage/carousel',
            'visibility' => 'public',
            'throw' => false,
        ],

        'user' => [
            'driver' => 'local',
            'root' => storage_path('app/public/user'),
            'url' => env('APP_URL').'/storage/user',
            'visibility' => 'public',
            'throw' => false,
        ],

        'article_category' => [
            'driver' => 'local',
            'root' => storage_path('app/public/article_category'),
            'url' => env('APP_URL').'/storage/article_category',
            'visibility' => 'public',
            'throw' => false,
        ],


        'assets' => [
            'driver' => 'local',
            'root' => storage_path('app/public/assets'),
            'url' => env('APP_URL').'/storage/assets',
            'visibility' => 'public',
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
        public_path('storage/promo') => storage_path('app/public/promo'),
        public_path('storage/assets') => storage_path('app/public/assets'),
        public_path('storage/article') => storage_path('app/public/article'),
        public_path('storage/featured_games') => storage_path('app/public/featured_games'),
        public_path('storage/carousel') => storage_path('app/public/carousel'),
        public_path('storage/user') => storage_path('app/public/user'),
        public_path('storage/article_category') => storage_path('app/public/article_category'),
    ],

];
