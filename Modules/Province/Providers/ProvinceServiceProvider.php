<?php

namespace Modules\Province\Providers;

use Modules\Support\Traits\AddsAsset;
use Illuminate\Support\ServiceProvider;

use Modules\Admin\Ui\Facades\TabManager;
use Modules\Province\Admin\ProvinceTabs;

class ProvinceServiceProvider extends ServiceProvider
{
    use AddsAsset;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        TabManager::register('provinces', ProvinceTabs::class);
    }
}
