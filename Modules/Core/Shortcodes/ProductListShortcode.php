<?php

namespace Modules\Core\Shortcodes;

use Modules\Product\Entities\Product;

class ProductListShortcode
{

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {

        $data['shortcode'] = $shortcode;
        $categoryIds = explode(',', $shortcode->category_ids);
        $products = Product::whereHas('categories', function ($query) use($categoryIds){
            $query->whereIn('categories.id', $categoryIds);
        })
            ->orderBy('created_at', 'DESC')
            ->limit($shortcode->limit)
            ->get();
        $data['products'] = $products;
        $data['id'] = rand(1, 10000);
        return view('public.shortcode.product_list', $data);
    }

}
