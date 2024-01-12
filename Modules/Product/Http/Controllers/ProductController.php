<?php

namespace Modules\Product\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;
use Modules\Attribute\Entities\Attribute;
use Modules\Category\Entities\Category;
use Modules\Review\Entities\Review;
use Modules\Product\Entities\Product;
use Modules\Product\Events\ProductViewed;
use Modules\Product\Filters\ProductFilter;
use Modules\Product\Http\Middleware\SetProductSortOption;
use Modules\Tag\Entities\Tag;

class ProductController extends Controller
{
    use ProductSearch;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(SetProductSortOption::class)->only('index');
    // }

    /**
     * Display a listing of the resource.
     *
     * @param \Modules\Product\Entities\Product $model
     * @param \Modules\Product\Filters\ProductFilter $productFilter
     * @return \Illuminate\Http\Response
     */
    public function index(Product $model, ProductFilter $productFilter, Request $request)
    {
        SEOMeta::setTitle('Danh sách sản phẩm - Webmaster');
        SEOMeta::setDescription('Trang danh sách sản phẩm công ty Webmaster Việt Nam');
        
        $categories = Category::tree();
        $topics = $categories->first()->items[0]->items;

        $tags = Tag::get();
        $colors = Attribute::where('slug','mau-sac')->firstOrFail()->values()->get();
        $attributes = Attribute::where('slug','nen-tang')->firstOrFail()->values()->get();

        $colorSelected = [];
        if (isset($request["attribute"]["mau-sac"])) {
            $colorSelected = $request["attribute"]["mau-sac"];
        }

        $ratingSelected = [];
        if (isset($request["rate"])) {
            $ratingSelected = $request["rate"];
        }

        

        $attributeSelected = [];
        if (isset($request["attribute"]["nen-tang"])) {
            $attributeSelected = $request["attribute"]["nen-tang"];
        }

        $tagSelected = [];
        if (isset($request["tag"])) {
            $tagSelected = $request["tag"];
        }

        $priceStart = [];
        if (isset($request["price_start"])) {
            $priceStart = $request["price_start"];
        }else {
            $priceStart = null;
        }

        if (isset($request["price_end"])) {
            $priceEnd = $request["price_end"];
        }else {
            $priceEnd = null;
        }

        if (request()->expectsJson()) {
            return $this->searchProducts($model, $productFilter);
        }

        $products = $this->getSearchProducts($model, $productFilter);

        if ($request["sort"] == "news") {
            $products = Category::find(1)->products()->orderBy('id', 'desc')->paginate(12);
        }

        if ($request["sort"] == "priceup") {
            $products = Category::find(1)->products()->orderBy('special_price', 'asc')->paginate(12);
        }

        if ($request["sort"] == "pricedown") {
            $products = Category::find(1)->products()->orderBy('special_price', 'desc')->paginate(12);
        }

        return view('public.products.list_product', compact('priceEnd','priceStart','tags', 'colors', 'attributes', 'products','topics', 'attributeSelected', 'tagSelected','colorSelected'));
    }

    /**
     * Show the specified resource.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // dd($slug);
        $product = Product::findBySlug($slug);
        $relatedProducts = $product->relatedProducts()->forCard()->get();
        $upSellProducts = $product->upSellProducts()->forCard()->get();
        $review = $this->getReviewData($product);
        event(new ProductViewed($product));
        // , compact('product', 'relatedProducts', 'upSellProducts', 'review')
        return view('public.products.show');
    }

    private function getReviewData(Product $product)
    {
        if (! setting('reviews_enabled')) {
            return;
        }

        return Review::countAndAvgRating($product);
    }

}
