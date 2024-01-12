<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
                          http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ gmdate("Y-m-d\TH:i:s\+00:00") }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>

    @foreach ($posts as $post)
    <url>
        <loc>{{ url('/') }}/{{ $post->slug }}</loc>
        <lastmod>{{ $post->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    @foreach ($categories as $category)
    <url>
        <loc>{{ url('/') }}/{{ $category->slug }}</loc>
        <lastmod>{{ $category->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    @foreach ($products as $product)
    <url>
        <loc>{{ url('/') }}/san-pham/{{ $product->slug }}</loc>
        <lastmod>{{ $product->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach

    @foreach ($pages as $page)
    <url>
        <loc>{{ url('/') }}/{{ $page->slug }}</loc>
        <lastmod>{{ $page->updated_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
</urlset>