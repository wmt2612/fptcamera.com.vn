<?php

namespace Modules\Option\Providers;

use Modules\Product\Entities\Product;
use Modules\Service\Entities\Service;
use Modules\Option\Listeners\SaveProductOptions;
use Modules\Option\Listeners\SaveServiceOptions;

use Modules\Option\Http\Requests\SaveProductOptionsRequest;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Product::saving(function () {
            resolve(SaveProductOptionsRequest::class);
        });
        Product::saved(SaveProductOptions::class);
        Service::saved(SaveServiceOptions::class);
    }
}
