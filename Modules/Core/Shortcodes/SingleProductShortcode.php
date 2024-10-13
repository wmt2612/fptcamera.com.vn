<?php

namespace Modules\Core\Shortcodes;

use Modules\Product\Entities\Product;

class SingleProductShortcode
{

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {
        $product = Product::find($shortcode->id);
        if ($product) {
            $category = $product->categories()->first();
            $customDesc = $shortcode->desc ? urldecode($shortcode->desc) : null;
            return view('public.shortcode.single_product', compact(
                'shortcode',
                'content',
                'product',
                'category',
                'customDesc'
            ));
        }
    }

}
