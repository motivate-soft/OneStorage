<?php

use Jenssegers\Agent\Agent as Agent;


$Agent = new Agent();
// agent detection influences the view storage path
if ($Agent->isDesktop()) {
    // you're a mobile device
    $viewPath = resource_path('views/desktop');
} else {
    // you're a desktop device, or something similar
    $viewPath = resource_path('views/mobile');
}

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'paths' => [
        // resource_path('views'),
        $viewPath
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | This option determines where all the compiled Blade templates will be
    | stored for your application. Typically, this is within the storage
    | directory. However, as usual, you are free to change this value.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views'))
    ),

];
