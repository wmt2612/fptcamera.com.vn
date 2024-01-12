<?php

namespace Modules\Page\Providers;

use Modules\Page\Admin\PageTabs;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\Page\Http\Controllers\PageController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Support\Traits\AddsAsset;

class PageServiceProvider extends ServiceProvider
{
    use AddsAsset;
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        TabManager::register('pages', PageTabs::class);
        $this->addAdminAssets('admin.pages.(create|edit)', [
            'admin.media.css', 'admin.media.js'
        ]);
        // $this->registerPageRoute();
    }

    private function registerPageRoute()
    {
        $this->app->booted(function () {
            Route::get('{slug}', [PageController::class, 'show'])
                ->prefix(LaravelLocalization::setLocale())
                ->middleware(['localize', 'locale_session_redirect', 'localization_redirect', 'web'])
                ->name('pages.show');
        });
    }
}
