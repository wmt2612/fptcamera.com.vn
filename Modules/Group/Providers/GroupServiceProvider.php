<?php

namespace Modules\Group\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Support\Traits\AddsAsset;

class GroupServiceProvider extends ServiceProvider
{

    use AddsAsset;


    public function boot()
    {
        $this->addAdminAssets('admin.groups.index', [
            'admin.group.css', 'admin.jstree.js', 'admin.group.js',
            'admin.media.css', 'admin.media.js',
        ]);
    }
}
