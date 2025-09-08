<?php

namespace Themes\anan\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Modules\Group\Entities\Group;
use Modules\Post\Entities\Post;
use Modules\Product\Entities\Product;
use Modules\Product\Events\ShowingProductList;
use Modules\Product\Filters\ProductFilter;
use Modules\Product\Http\Controllers\ProductSearch;
use Modules\Slider\Entities\Slider;

use SEO;
use SEOMeta;

class HomeV2Controller
{
    use ProductSearch;

    public function index(Product $model, ProductFilter $productFilter, Request $request)
    {
        // Cache settings để tránh gọi DB nhiều lần
        $settings = Cache::remember('site_settings', 3600, function () {
            return [
                'meta_title' => setting('meta_title_of_home'),
                'meta_desc' => setting('meta_description_of_home') ?? setting('store_name'),
                'meta_keyword' => setting('meta_keyword_of_home') ?? setting('store_name'),
                'store_name' => setting('store_name'),
            ];
        });

        // SEO
        SEO::setTitle($settings['meta_title']);
        SEO::setDescription($settings['meta_desc']);
        SEOMeta::addKeyword($settings['meta_keyword']);
        SEO::opengraph()->setUrl(url()->current());
        SEO::twitter()->setSite(url()->current());
        SEO::jsonLd()->addImage(asset('themes/anan/assets/images/2020/04/logo.jpg'));

        // Nếu có search → xử lý riêng
        if ($request->has('s')) {
            $request['sort'] = 'latest';

            $products = $this->getSearchProducts($model, $productFilter);
            $groups = Group::whereNull('parent_id')->limit(5)->get();
            $newProducts = $model->orderByDesc('id')->limit(5)->get();

            return view('public.product.search_result', compact('products', 'groups', 'newProducts'));
        }

        // Cache dữ liệu homepage trong 10 phút
        $data = Cache::remember('homepage_data', 3600, function () {
            return [
                'slider'        => Slider::findWithSlides(3),
                'sliderbanners' => Slider::findWithSlides(8),
                'deals'         => Product::whereNotNull('special_price')
                                    ->latest('id')
                                    ->limit(10)
                                    ->get(),
                'recommends'    => Product::whereNotNull('special_price')
                                    ->oldest('id')
                                    ->limit(10)
                                    ->get(),
                'latest'        => Product::latest('id')->limit(10)->get(),
                'latest_posts'  => Post::latest()->limit(8)->get(),
            ];
        });

        return view('v2.home.index-v2', $data );
    }

}