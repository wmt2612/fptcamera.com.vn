<?php

namespace Modules\Core\Shortcodes;

class CaptionShortcode
{

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        // dd($name);
        $width = '100%';

        if($shortcode->width){
            $width = $shortcode->width . 'px';
        }

        return sprintf('<div id="%s" class="" style="width:%s">
                            %s
                        </div>', $shortcode->id, $width, $content);
    }

}
