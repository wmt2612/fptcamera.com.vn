<?php

namespace Modules\Core\ViewComposers;
use Illuminate\Contracts\View\View;
use Shortcode;

class ShortcodeViewComposer {
    public function compose(View $view) {
        $view->withShortcodes();
    }
}
