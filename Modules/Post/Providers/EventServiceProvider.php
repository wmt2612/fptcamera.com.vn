<?php

namespace Modules\Post\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \Modules\Post\Events\PostViewed::class => [
            \Modules\Post\Listeners\IncrementPostView::class,
        ]
    ];
}
