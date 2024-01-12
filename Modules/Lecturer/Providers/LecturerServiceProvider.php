<?php

namespace Modules\Lecturer\Providers;

use Modules\Support\Traits\AddsAsset;
use Illuminate\Support\ServiceProvider;
use Modules\Lecturer\Admin\LecturerTabs;
use Modules\Admin\Ui\Facades\TabManager;
class LecturerServiceProvider extends ServiceProvider
{
    use AddsAsset;

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        TabManager::register('lecturers', LecturerTabs::class);

        $this->addAdminAssets('admin.lecturers.(create|edit)', [
            'admin.media.css', 'admin.media.js', 'admin.product.css', 'admin.product.js',
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
