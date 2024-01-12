<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\ViewComposers\ShortcodeViewComposer;

use Auth;

class ShortcodeComposerServiceProvider extends ServiceProvider {

    public function boot() {
        view()->composer("public.*", ShortcodeViewComposer::class);
    }
}
