<?php

namespace Modules\Area\Providers;

use Modules\Support\Traits\AddsAsset;
use Illuminate\Support\ServiceProvider;
use Modules\Area\Admin\AreaTabs;
use Modules\Admin\Ui\Facades\TabManager;


class AreaServiceProvider extends ServiceProvider
{
    use AddsAsset;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        TabManager::register('areas', AreaTabs::class);
    }
}
