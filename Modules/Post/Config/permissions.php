<?php

return [
    'admin.posts' => [
        'index' => 'post::permissions.index',
        'create' => 'post::permissions.create',
        'edit' => 'post::permissions.edit',
        'destroy' => 'post::permissions.destroy',
    ],
];
