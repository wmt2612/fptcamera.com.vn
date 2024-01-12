<?php

namespace Modules\Tagp\Providers;
use Modules\Tagp\Table\TagPTabs;
use Modules\Support\Traits\AddsAsset;
use Illuminate\Support\ServiceProvider;
use Modules\Admin\Ui\Facades\TabManager;

class TagpServiceProvider extends ServiceProvider
{
    use AddsAsset;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        TabManager::register('tag_ps', TagPTabs::class);
    }
}
