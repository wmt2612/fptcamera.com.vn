<?php

namespace Modules\Core\Shortcodes;

class InfoRegisterFormShortcode
{
    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        return view('v2.shortcodes.info-register-form', compact('shortcode', 'content'));
    }
}
