<?php

namespace Modules\Core\Shortcodes;
use Illuminate\Support\Str;

class ToggleShortcode
{

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $class = null;
        $title = html_entity_decode($shortcode->title) ?: '';
        switch ($shortcode->state) {
            case 'close':
                $class = 'collapse';
                break;
            case 'open':
                $class = 'collapse show';
                break;
            default:
                $class = '';
                break;
        }
        return sprintf('<div class="toggle-shortcode">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#%s" aria-expanded="true" aria-controls="%s">
                                %s
                                </button>
                            </h5>
                            <div id="%s" class="%s" aria-labelledby="%s">
                                <div class="card-body">
                                    %s
                                </div>
                            </div>
                        </div>', Str::slug($title), Str::slug($title), $title, Str::slug($title), $class, Str::slug($title), $content);
    }

}
