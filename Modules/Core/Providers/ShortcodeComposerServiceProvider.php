<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\ViewComposers\ShortcodeViewComposer;

use Auth;

class ShortcodeComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        view()->composer([
            "public.*",
            "v2.product.category",
            "v2.product.page_category",
            "v2.product.all_category",
            "v2.product.show",
        ],
            ShortcodeViewComposer::class
        );
    }
}
