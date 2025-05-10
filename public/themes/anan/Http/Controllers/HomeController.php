<?php

namespace Themes\Anan\Http\Controllers;

use Artesaos\SEOTools\Contracts\SEOTools;
use Modules\Menu\MegaMenu\MegaMenu;
use Modules\Slider\Entities\Slider;
use Illuminate\Http\Request;
use Modules\Category\Entities\Category;
use Modules\Post\Entities\Post;
use Modules\Group\Entities\Group;
use Modules\Page\Entities\Page;
use Modules\Product\Entities\Product;
use Modules\Product\Filters\ProductFilter;
use Modules\Product\Http\Controllers\ProductSearch;

use SEO;
use SEOMeta;

class HomeController
{
    use ProductSearch;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $model, ProductFilter $productFilter, Request $request)
    {
        SEO::setTitle(setting('meta_title_of_home'));
        SEO::setDescription(setting('meta_description_of_home') ?? setting('store_name'));
        SEOMeta::addKeyword(setting('meta_keyword_of_home') ?? setting('store_name'));
        SEO::opengraph()->setUrl(url()->current());
        SEO::twitter()->setSite('https://fptcamera.com.vn');
        SEO::jsonLd()->addImage('https://fptcamera.com.vn/themes/anan/assets/images/2020/04/logo.jpg');

    	$data['slider'] = Slider::findWithSlides(3);
    	$data['sliderbanners'] = Slider::findWithSlides(8);
        $data['deals'] = Product::whereNotNull('special_price')->limit(10)->orderBy('id','desc')->get();
        $data['recommends'] = Product::whereNotNull('special_price')->limit(10)->orderBy('id','asc')->get();
        $data['latest'] = Product::limit(10)->orderBy('id','desc')->get();

        $lastblog = Group::where('slug', 'thong-tin-huu-ich')->first();
        $data['latest_posts'] = $lastblog->posts()->limit(8)->get();
      
        if($request->get('s'))
        {
            $request['sort'] = 'latest';
            $products = $this->getSearchProducts($model, $productFilter);
            $groups = Group::whereNull('parent_id')->limit(5)->get();
            $newProducts = $model->orderByDesc('id')->limit(5)->get();
            $data = [
                'products' => $products,
                'groups' => $groups,
                'newProducts' => $newProducts
            ];

            return view('public.product.search_result', $data);
        }

    	$data['slider'] = Slider::findWithSlides(3);
    	$data['sliderbanners'] = Slider::findWithSlides(8);

        return view('v2.home.index', $data );
    }

    public function homeV2(Product $model, ProductFilter $productFilter, Request $request)
    {
        SEO::setTitle(setting('meta_title_of_home'));
        SEO::setDescription(setting('meta_description_of_home') ?? setting('store_name'));
        SEOMeta::addKeyword(setting('meta_keyword_of_home') ?? setting('store_name'));
        SEO::opengraph()->setUrl(url()->current());
        SEO::twitter()->setSite('https://fptcamera.com.vn');
        SEO::jsonLd()->addImage('https://fptcamera.com.vn/themes/anan/assets/images/2020/04/logo.jpg');

    	$data['slider'] = Slider::findWithSlides(3);
    	$data['sliderbanners'] = Slider::findWithSlides(8);
        $data['deals'] = Product::whereNotNull('special_price')->limit(10)->orderBy('id','desc')->get();
        $data['recommends'] = Product::whereNotNull('special_price')->limit(10)->orderBy('id','asc')->get();
        $data['latest'] = Product::limit(10)->orderBy('id','desc')->get();

        $data['latest_posts'] = Post::limit(8)->latest()->get();

        if($request->get('s'))
        {
            $request['sort'] = 'latest';
            $products = $this->getSearchProducts($model, $productFilter);
            $groups = Group::whereNull('parent_id')->limit(5)->get();
            $newProducts = $model->orderByDesc('id')->limit(5)->get();
            $data = [
                'products' => $products,
                'groups' => $groups,
                'newProducts' => $newProducts
            ];

            return view('public.product.search_result', $data);
        }

    	$data['slider'] = Slider::findWithSlides(3);
    	$data['sliderbanners'] = Slider::findWithSlides(8);

        return view('v2.home.index', $data );
    }

   public function generateSitemap()
    {
        $pages = Page::latest()->select('id', 'slug', 'updated_at')->get();
        $posts = Post::latest()->select('id', 'slug', 'updated_at')->get();
        $products = Product::latest()->select('id', 'slug', 'updated_at')->take(10)->get();
        $categories = Category::latest()->select('id', 'slug', 'updated_at')->take(10)->get();
        return response()->view('public.home.sitemap', [
            'pages' => $pages,
            'posts' => $posts,
            'products' => $products,
            'categories' => $categories
        ])->header('Content-Type', 'text/xml');
    }
}

