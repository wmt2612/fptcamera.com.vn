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

        // Tách phần <div id="toc-header"> để không thay thế nội dung trong phần này
        $tocPattern = '/<div[^>]*class="[^"]*widget-toc[^"]*"[^>]*>(.+)<\/div>/is';
        preg_match($tocPattern, $content, $tocContent);

        // Xóa nội dung bên trong widget-toc
        $content = preg_replace($tocPattern, '<div class="widget-toc"></div>', $content);

        foreach ($autoLinks as $autoLink) {
            if ($pageType === AutoLink::RENDER_FOR_PAGE && $autoLink->for_page
                || ($pageType === AutoLink::RENDER_FOR_POST && $autoLink->for_post)
            ) {
                // Prevent duplicate links
                $pattern = '/' . preg_quote($autoLink->title, '/') . '/i';

                if ($autoLink->is_duplicate) {
                    $content = preg_replace_callback($pattern, function ($matches) use ($autoLink) {
                        return $autoLink->getUrl($matches[0]);
                    }, $content, $autoLink->limit);
                } else {
                    $content = preg_replace_callback($pattern, function ($matches) use ($autoLink) {
                        return $autoLink->getUrl($matches[0]);
                    }, $content, 1);
                }
            }
        }

        // Thêm lại nội dung trong widget-toc
        if (isset($tocContent[1])) {
            $content = preg_replace('/<div class="widget-toc"><\/div>/', '<div class="widget-toc">' . $tocContent[1] . '</div>', $content);
        }

        $removeLinkInHeadingsPattern = '/<h([1-6])([^>]*)>(.*?)<\/h[1-6]>/is';
        $content = preg_replace_callback($removeLinkInHeadingsPattern, function ($matches) {
            // Loại bỏ thẻ <a> trong nội dung thẻ tiêu đề nhưng giữ lại nội dung
            $headingContent = preg_replace('/<a[^>]*>(.*?)<\/a>/is', '$1', $matches[3]);

            // Trả về thẻ tiêu đề đã loại bỏ thẻ <a> nhưng giữ lại các thuộc tính và nội dung, không cố định thẻ h1
            return "<h{$matches[1]}{$matches[2]}>{$headingContent}</h{$matches[1]}>";
        }, $content);

        return $content;
    }
}