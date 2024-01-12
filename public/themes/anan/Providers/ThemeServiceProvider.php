<?php

namespace Themes\Anan\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Ui\Facades\TabManager;
use Themes\Anan\Admin\AnanTabs;
use Modules\Support\Traits\AddsAsset;
use Illuminate\Support\Facades\View;

use Themes\Anan\Http\ViewComposer\LayoutComposer;
use Themes\Anan\Http\ViewComposer\HomeComposer;
use Themes\Anan\Http\ViewComposer\BlogComposer;
use Themes\Anan\Http\ViewComposer\AnanViewComposer;

class ThemeServiceProvider extends ServiceProvider
{
    use AddsAsset;

    public function boot()
    {

    	View::composer('public.*', LayoutComposer::class);
    	View::composer('public.home.*', HomeComposer::class);
        View::composer('public.post.*', BlogComposer::class);
        View::composer('public.*', AnanViewComposer::class);


        TabManager::register('anan', AnanTabs::class);
        $this->addAdminAssets('admin.anan.settings.edit', [
            'admin.media.css', 'admin.media.js'
        ]);
    }
}
