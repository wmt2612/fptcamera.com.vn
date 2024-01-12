<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Define which assets will be available through the asset manager
    |--------------------------------------------------------------------------
    | These assets are registered on the asset manager
    */
    'all_assets' => [
        'admin.gallery.css' => ['module' => 'gallery:admin/css/gallery.css'],
        'admin.gallery.js' => ['module' => 'gallery:admin/js/gallery.js'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Define which default assets will always be included in your pages
    | through the asset pipeline
    |--------------------------------------------------------------------------
    */
    'required_assets' => [],
];
