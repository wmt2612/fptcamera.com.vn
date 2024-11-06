<?php

namespace Modules\AutoLink\Helpers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Modules\AutoLink\Entities\AutoLink;

class RenderAutoLink
{
    public static function handle($content, $pageType)
    {
        $autoLinks = AutoLink::all();
        $content = html_entity_decode($content);

        foreach ($autoLinks as $autoLink) {
            if ($pageType === AutoLink::RENDER_FOR_PAGE && $autoLink->for_page
                || ($pageType === AutoLink::RENDER_FOR_POST && $autoLink->for_post)
            ) {
                // Prevent duplicate links
                $pattern = '/' . preg_quote($autoLink->title, '/') . '/i';

                if ($autoLink->is_duplicate) {
                    $content = preg_replace_callback($pattern, function ($matches) use ($autoLink) {
                        return $autoLink->getUrl($matches[0]);
                    }, $content);
                } else {
                    $content = preg_replace_callback($pattern, function ($matches) use ($autoLink) {
                        return $autoLink->getUrl($matches[0]);
                    }, $content, 1);
                }
            }
        }

        return $content;
    }
}