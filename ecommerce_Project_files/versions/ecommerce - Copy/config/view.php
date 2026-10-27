<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Where Blade templates live. Add more paths here if the app ever loads
    | views from a package or a theme folder.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | Laravel's default for this is realpath(storage_path('framework/views')),
    | and realpath() returns false when the folder is missing — which surfaces
    | as "Please provide a valid cache path." after a fresh clone or an
    | unzip that dropped the empty directory.
    |
    | Using storage_path() directly keeps this a real string, and Blade creates
    | the directory itself on first compile.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        storage_path('framework/views')
    ),

];