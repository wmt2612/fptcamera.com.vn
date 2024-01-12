<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Define which assets will be available through the asset manager
    |--------------------------------------------------------------------------
    | These assets are registered on the asset manager
    */
    'all_assets' => [
        'admin.tagp.css' => ['module' => 'tagp:admin/css/tagp.css'],
        'admin.tagp.js' => ['module' => 'tagp:admin/js/tagp.js'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Define which default assets will always be included in your pages
    | through the asset pipeline
    |--------------------------------------------------------------------------
    */
    'required_assets' => [],
];
