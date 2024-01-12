<?php

namespace Modules\CategoryService\Providers;

use Modules\Support\Traits\AddsAsset;
use Illuminate\Support\ServiceProvider;

class CategoryServiceServiceProvider extends ServiceProvider
{
    use AddsAsset;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->addAdminAssets('admin.category_services.index', [
            'admin.categoryservice.css', 'admin.jstree.js', 'admin.categoryservice.js',
            'admin.media.css', 'admin.media.js',
        ]);
    }
}
