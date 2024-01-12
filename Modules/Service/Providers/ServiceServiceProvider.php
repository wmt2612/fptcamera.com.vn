<?php

namespace Modules\Service\Providers;

use Modules\Support\Traits\AddsAsset;
use Illuminate\Support\ServiceProvider;
use Modules\Service\Admin\ServiceTabs;
use Modules\Admin\Ui\Facades\TabManager;


class ServiceServiceProvider extends ServiceProvider
{
    use AddsAsset;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        TabManager::register('services', ServiceTabs::class);

        $this->addAdminAssets('admin.services.(create|edit)', [
            'admin.media.css', 'admin.media.js', 'admin.service.css', 'admin.service.js',
        ]);
    }
}
