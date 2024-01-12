<?php

namespace Modules\Review\Providers;

use Modules\Review\Admin\ReviewTabs;
use Modules\Support\Traits\AddsAsset;
use Illuminate\Support\ServiceProvider;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\Review\Admin\ProductTabsExtender;
use Modules\Review\Admin\ReviewQuestionTabs;

class ReviewServiceProvider extends ServiceProvider
{
    use AddsAsset;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        TabManager::register('reviews', ReviewTabs::class);
        TabManager::register('review_questions', ReviewQuestionTabs::class);
        TabManager::extend('products', ProductTabsExtender::class);
    }
}
