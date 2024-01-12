<?php

namespace Modules\Core\Shortcodes;

class ViewMoreShortcode
{

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        return view('core::shortcode.view_more', compact('shortcode', 'content'));
    }

}
