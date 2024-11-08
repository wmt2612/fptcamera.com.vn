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

        // Tách phần <div id="toc-header"> để không thay thế nội dung trong phần này
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true); // Để xử lý các lỗi cảnh báo khi tải HTML
        $dom->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
        $xpath = new \DOMXPath($dom);
        $nodeList = $xpath->query('//div[contains(@class, "widget-toc")]');

        if ($nodeList->length > 0) {
            $widgetTocContent = $dom->saveHTML($nodeList->item(0));

            // Duyệt qua các thẻ và xóa nội dung bên trong
            foreach ($nodeList as $tocDiv) {
                // Xóa tất cả các con (child) của thẻ div
                while ($tocDiv->firstChild) {
                    $tocDiv->removeChild($tocDiv->firstChild);
                }
            }
        }

        // Lấy lại nội dung HTML đã chỉnh sửa
        $content = html_entity_decode($dom->saveHTML());

        foreach ($autoLinks as $autoLink) {
            if ($pageType === AutoLink::RENDER_FOR_PAGE && $autoLink->for_page
                || ($pageType === AutoLink::RENDER_FOR_POST && $autoLink->for_post)
            ) {
                // Prevent duplicate links
                $pattern = '/' . preg_quote($autoLink->title, '/') . '/i';
                $limit = $autoLink->limit;

                if (!$autoLink->is_duplicate) {
                    $limit = 1;
                }

                $keywords = explode(',', $autoLink->title);

                if (count($keywords) > 1) {
                    foreach ($keywords as $keyword) {
                        $keywordPattern = '/' . preg_quote(trim($keyword), '/') . '/i';
                        $content = preg_replace_callback($keywordPattern, function ($matches) use ($autoLink) {
                            return $autoLink->getUrl($matches[0]);
                        }, $content, $limit);
                    }
                } else {
                    $content = preg_replace_callback($pattern, function ($matches) use ($autoLink) {
                        return $autoLink->getUrl($matches[0]);
                    }, $content, $limit);
                }
            }
        }

        // Thêm lại nội dung trong widget-toc
        if (isset($widgetTocContent)) {
            $tocPattern = '/<div[^>]*class="[^"]*\bwidget-toc\b[^"]*"[^>]*><\/div>/is';
            $content = preg_replace($tocPattern, $widgetTocContent, $content);
        }

        $removeLinkInHeadingsPattern = '/<h([1-6])([^>]*)>(.*?)<\/h[1-6]>/is';
        $content = preg_replace_callback($removeLinkInHeadingsPattern, function ($matches) {
            // Loại bỏ thẻ <a> trong nội dung thẻ tiêu đề nhưng giữ lại nội dung
            $headingContent = preg_replace('/<a[^>]*>(.*?)<\/a>/is', '$1', $matches[3]);

            // Trả về thẻ tiêu đề đã loại bỏ thẻ <a> nhưng giữ lại các thuộc tính và nội dung, không cố định thẻ h1
            return "<h{$matches[1]}{$matches[2]}>{$headingContent}</h{$matches[1]}>";
        }, $content);

        // Xử lý lỗi khi sử dụng DOMDocument nếu có
        libxml_clear_errors();

        return $content;
    }

    private static function decodeHTMLString($htmlString)
    {
        $decodedContent = urldecode($htmlString);
        return utf8_decode($decodedContent);
    }
}