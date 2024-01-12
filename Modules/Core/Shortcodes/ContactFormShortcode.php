<?php

namespace Modules\Core\Shortcodes;

class ContactFormShortcode
{

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        return view('public.shortcode.contact_form', compact('shortcode'));
    }

}
