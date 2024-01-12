<?php

namespace Modules\Core\Shortcodes;

class ButtonShortcode
{

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        return view('public.shortcode.button', compact('shortcode', 'content'));
    }

}
