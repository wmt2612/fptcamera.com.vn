<?php

namespace Modules\Gallery\Providers;

use Modules\Support\Traits\AddsAsset;
use Illuminate\Support\ServiceProvider;

use Modules\Gallery\Admin\GalleryTabs;
use Modules\Admin\Ui\Facades\TabManager;

class GalleryServiceProvider extends ServiceProvider
{
    use AddsAsset;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        TabManager::register('galleries', GalleryTabs::class);

        $this->addAdminAssets('admin.galleries.(create|edit)', [
            'admin.media.css', 'admin.media.js',
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
