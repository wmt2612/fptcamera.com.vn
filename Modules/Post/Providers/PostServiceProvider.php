<?php

namespace Modules\Post\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Ui\Facades\TabManager;
use Modules\Post\Admin\PostTabs;
use Modules\Support\Traits\AddsAsset;

class PostServiceProvider extends ServiceProvider
{
    use AddsAsset;

    public function boot()
    {
        TabManager::register('posts', PostTabs::class);

        $this->addAdminAssets('admin.posts.(create|edit)', [
            'admin.media.css', 'admin.media.js', 'admin.post.js',
        ]);
    }
}
