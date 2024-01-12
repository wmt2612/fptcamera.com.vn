<?php

namespace Modules\Core\Shortcodes;

class BoxAlertShortcode
{

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        // dd($shortcode);
        $class = null;
        switch ($shortcode->type) {
            case 'info':
                $class = 'fa fa-info-circle';
                break;
            case 'success':
                $class = 'fa fa-check-circle-o';
                break;
            case 'warning':
                $class = 'fa fa-exclamation-triangle';
                break;
            case 'error':
                $class = 'fa fa-ban';
                break;
            case 'download':
                $class = 'fa fa-download';
                break;
            case 'note':
                $class = 'fa fa-file-text-o';
                break;
            case 'shadow':
            default:
                break;
        }
        return view('public.shortcode.box', compact('shortcode', 'content', 'class'));
    }

}
