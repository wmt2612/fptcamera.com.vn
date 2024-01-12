<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Define which assets will be available through the asset manager
    |--------------------------------------------------------------------------
    | These assets are registered on the asset manager
    */
    'all_assets' => [
        'admin.group.css' => ['module' => 'group:admin/css/group.css'],
        'admin.group.js' => ['module' => 'group:admin/js/group.js'],
        'admin.jstree.js' => ['module' => 'group:admin/js/jstree.js'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Define which default assets will always be included in your pages
    | through the asset pipeline
    |--------------------------------------------------------------------------
    */
    'required_assets' => [],
];
