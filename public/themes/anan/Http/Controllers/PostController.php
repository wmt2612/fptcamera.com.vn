<?php

namespace Themes\Anan\Http\Controllers;

use Modules\Menu\MegaMenu\MegaMenu;
use Modules\Slider\Entities\Slider;
use Illuminate\Http\Request;
use Modules\Post\Entities\Post;
use Modules\Group\Entities\Group;
use Modules\Product\Entities\Product;
use Modules\Product\Filters\ProductFilter;
use Modules\Product\Http\Controllers\ProductSearch;
use Artesaos\SEOTools\SEOTools;
use SEO;
use SEOMeta;

class PostController
{
    public function index(Product $model, ProductFilter $productFilter, Request $request)
    {
        SEO::setTitle('Anantelecom - Tin công nghệ');
        SEO::setDescription(setting('meta_description_of_home') ?? 'Tin tức về công nghệ');
        SEOMeta::addKeyword(setting('meta_keyword_of_home') ?? setting('store_name'));
        SEO::opengraph()->setUrl(url()->current());
        SEO::twitter()->setSite('https://fptcamera.com.vn');
        SEO::jsonLd()->addImage('https://fptcamera.com.vn/themes/anan/assets/images/2020/04/logo.jpg');
        $data = [];
        $number_main_post = 4;

        $cate1 = Group::find( setting('blogcategory_main1') );
        $cate2 = Group::find( setting('blogcategory_main2') );
        $cate3 = Group::find( setting('blogcategory_main3') );
        $cate4 = Group::find( setting('blogcategory_main4') );

        $data['catemain1'] = $cate1;
        $data['catemain2'] = $cate2;
        $data['catemain3'] = $cate3;
        $data['catemain4'] = $cate4;

        $data['main1'] = $cate1->posts()->orderBy('id','desc')->limit($number_main_post)->get();
        $data['main2'] = $cate2->posts()->orderBy('id','desc')->limit($number_main_post)->get();
        $data['main3'] = $cate3->posts()->orderBy('id','desc')->limit($number_main_post)->get();
        $data['main4'] = $cate4->posts()->orderBy('id','desc')->limit($number_main_post)->get();

        return view('public.post.index', $data );
    }
    public function category(Request $request, $slug)
    {
        $data = [];
        $category = Group::whereSlug($slug)->firstOrFail();
        $data['category'] = $category;
        $data['posts'] = $category->posts()->orderBy('id','desc')->paginate(10);
        return view('public.post.category', $data );
    }
    public function single(Request $request, $slug)
    {
        return redirect()->route('product.category', ['slug' => $slug]);
        // $data = [];

        // $post = Post::whereSlug($slug)->firstOrFail();
        // $data['post'] = $post;
        // SEO::setTitle($post->translation->name);
        // SEO::setDescription($post->translation->name);
        // SEOMeta::addKeyword($post->translation->name);
        // SEO::opengraph()->setUrl(url()->current());
        // SEO::twitter()->setSite('https://fptcamera.com.vn');
        // SEO::jsonLd()->addImage('https://fptcamera.com.vn/themes/anan/assets/images/2020/04/logo.jpg');
        
        // return view('public.post.single', $data );
    }
}

