<?php

namespace Themes\Anan\Http\Controllers;

use Artesaos\SEOTools\SEOTools;
use Illuminate\Http\Request;
use Modules\Product\Entities\Product;
use Modules\Category\Entities\Category;
use Modules\Brand\Entities\Brand;
use Illuminate\Support\Collection;
use Modules\Attribute\Entities\Attribute;
use Modules\Product\Events\ProductViewed;
use Modules\Product\Http\Controllers\ProductSearch;
use Modules\Product\RecentlyViewed;
use Themes\Anan\Http\Requests\PostCommentRequest;
use Modules\Product\Filters\ProductFilter;
use SEO;
use SEOMeta;
use Modules\Post\Entities\Post;
use Modules\Page\Entities\Page;
use Modules\Group\Entities\Group;


class ProductController
{
    use ProductSearch;

    private $perPage = 15;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate($this->perPage);

        $data = [
            'products' => $products
        ];

        return view('public.product.index', $data);
    }

    public function single($slug, RecentlyViewed $recentlyViewed)
    {
        $product = Product::findBySlug($slug);
        $product->load('crossSellProducts', 'upSellProducts', 'relatedProducts', 'reviews');
        $productsRecentlyViewed = $recentlyViewed->products();
        $relatedProducts = $product->getRelatedProductCat($product->categories->pluck('id')->toArray());
        $sameVersionProducts = $product->sameVersionProducts()->get();

        event(new ProductViewed($product));

        $breadcrumb = $this->getCategoryBreadCrumb($product->categories->nest());

        $data = [
            'product' => $product,
            'breadcrumb' => $breadcrumb,
            'productsRecentlyViewed' => $productsRecentlyViewed,
            'relatedProducts' => $relatedProducts,
            'sameVersionProducts' => $sameVersionProducts,
        ];

        SEO::setTitle($product->translation->name);
        SEO::setDescription($product->translation->name);
        SEOMeta::addKeyword($product->translation->name);
        SEO::opengraph()->setUrl(url()->current());
        SEO::twitter()->setSite('https://fptcamera.com.vn');
        SEO::jsonLd()->addImage('https://fptcamera.com.vn/themes/anan/assets/images/2020/04/logo.jpg');

        return view('public.product.single', $data);
    }

    public function singleV2($slug, RecentlyViewed $recentlyViewed)
    {
        $product = Product::findHiddenBySlug($slug);
        $product->load('crossSellProducts', 'upSellProducts', 'relatedProducts', 'reviews');
        $productsRecentlyViewed = $recentlyViewed->products();
        $relatedProducts = $product->getRelatedProductCat($product->categories->pluck('id')->toArray());
        $sameVersionProducts = $product->sameVersionProducts()->get();

        event(new ProductViewed($product));

        $breadcrumb = $this->getCategoryBreadCrumb($product->categories->nest());

        $data = [
            'product' => $product,
            'breadcrumb' => $breadcrumb,
            'productsRecentlyViewed' => $productsRecentlyViewed,
            'relatedProducts' => $relatedProducts,
            'sameVersionProducts' => $sameVersionProducts->toArray(),
        ];

        SEO::setTitle($product->translation->name);
        SEO::setDescription($product->translation->name);
        SEOMeta::addKeyword($product->translation->name);
        SEO::opengraph()->setUrl(url()->current());
        SEO::twitter()->setSite('https://fptcamera.com.vn');
        SEO::jsonLd()->addImage('https://fptcamera.com.vn/themes/anan/assets/images/2020/04/logo.jpg');

        return view('v2.product.show', $data);
    }

    public function category($slug, Product $model, ProductFilter $productFilter, Request $request)
    {
       $data = [];
      
        //Blog Category Index
        $blogCategory = Group::whereSlug($slug)->first();
        if($blogCategory) {
            $posts = $blogCategory->posts()->latest()->paginate(10);
            return view('public.post.category', [
                'category' => $blogCategory,
                'posts' => $posts
            ]);
        }
      
        //Page details
        $page = Page::whereSlug($slug)->first();
        if($page) {
            SEO::setTitle($page->metaData->meta_title ?? $page->name);
            SEO::setDescription($page->metaData->meta_description ?? $page->name);
            SEOMeta::addKeyword($page->metaData->meta_keyword ?? $page->name);
            SEO::opengraph()->setUrl(url()->current());
            SEO::twitter()->setSite('https://fptcamera.com.vn');
            SEO::jsonLd()->addImage('https://fptcamera.com.vn/themes/anan/assets/images/2020/04/logo.jpg');
            return view('public.pages.show', compact('page'));
        }
        //Post details
        $post = Post::whereSlug($slug)->first();
        if (!$post) {
            $category = Category::findBySlug($slug);
            $category->load('children', 'slider');
            $breadcrumb = $this->getCategoryBreadCrumbCat($category);
            $featuredProducts = $category->products()->limit(5)->get();
            if (!$request->get('sort')) {
                $request['sort'] = 'bestsale';
            }
            $request['category'] = $category->slug;
            $fromPrice = $request->fromPrice;
            $toPrice = $request->toPrice;
            // $products = $this->getSearchProducts($model, $productFilter);
            $attributes = Attribute::all();
            $brands = [];
            foreach ($category->products()->with('brand')->get() as $product) {
                if (count($brands) == 0) {
                    $brands[] = $product->brand;
                }
                $checkUnique = true;
                foreach ($brands as $brand) {
                    if ($product->brand->id === $brand->id) {
                        $checkUnique = false;
                        break;
                    }
                }
                if ($checkUnique && $product->brand_id !== null) $brands[] = $product->brand;
            }
             $products = $category->products()->withBrand($request->brand)
                ->sortPrice($request->sort)
                ->price($fromPrice, $toPrice)
                ->paginate(12);
            $productsWithCategory = $category->products()->withBrand($request->brand)
                ->sortPrice($request->sort)
                ->price($fromPrice, $toPrice);
            foreach ($request->all() as $key => $req) {
                foreach ($attributes as $attribute) {
                    if ($attribute->slug == $key) {
                        foreach ($attribute->values as $value) {
                            if ($value->id == $req) {
                                $productsId = [];
                                foreach ($value->products()->get() as $attributeValue) {
                                    $productsId[] = $attributeValue->product_id;
                                }
                                $products = $productsWithCategory->whereIn('id', $productsId)->paginate(12);
                            }
                        }
                    }
                }
            }

            $data = [
                'category' => $category,
                'products' => $products,
                'brands' => $brands,
                'breadcrumb' => $breadcrumb,
                'featuredProducts' => $featuredProducts

            ];

            SEO::setTitle($category->translation->name);
            SEO::setDescription($category->translation->name);
            SEOMeta::addKeyword($category->translation->name);
            SEO::opengraph()->setUrl(url()->current());
            SEO::twitter()->setSite('https://fptcamera.com.vn');
            SEO::jsonLd()->addImage('https://fptcamera.com.vn/themes/anan/assets/images/2020/04/logo.jpg');

            return view('public.product.category', $data);
        }
        $data['post'] = $post;
        SEO::setTitle($post->translation->name);
        SEO::setDescription($post->translation->name);
        SEOMeta::addKeyword($post->translation->name);
        SEO::opengraph()->setUrl(url()->current());
        SEO::twitter()->setSite('https://fptcamera.com.vn');
        SEO::jsonLd()->addImage('https://fptcamera.com.vn/themes/anan/assets/images/2020/04/logo.jpg');
        return view('public.post.single', $data);
    }

    public function categoryV2($slug, Product $model, ProductFilter $productFilter, Request $request)
    {
        $data = [];

        //Blog Category Index
        $blogCategory = Group::whereSlug($slug)->first();
        if($blogCategory) {
            $posts = $blogCategory->posts()->latest()->paginate(10);
            return view('public.post.category', [
                'category' => $blogCategory,
                'posts' => $posts
            ]);
        }

        //Page details
        $page = Page::whereSlug($slug)->first();
        if($page) {
            SEO::setTitle($page->metaData->meta_title ?? $page->name);
            SEO::setDescription($page->metaData->meta_description ?? $page->name);
            SEOMeta::addKeyword($page->metaData->meta_keyword ?? $page->name);
            SEO::opengraph()->setUrl(url()->current());
            SEO::twitter()->setSite('https://fptcamera.com.vn');
            SEO::jsonLd()->addImage('https://fptcamera.com.vn/themes/anan/assets/images/2020/04/logo.jpg');
            if($page->is_display_category) {
                return $this->pageWithDisplayCategoryTheme($page);
            }
            return view('public.pages.show', compact('page'));
        }
        //Post details
        $post = Post::whereSlug($slug)->first();
        if (!$post) {
            $category = Category::findBySlug($slug);
            $category->load('children', 'slider');
            $breadcrumb = $this->getCategoryBreadCrumbCat($category);
            $featuredProducts = $category->products()->limit(5)->get();
            if (!$request->get('sort')) {
                $request['sort'] = 'bestsale';
            }

            $fromPrice = $request->fromPrice;
            $toPrice = $request->toPrice;
            // $products = $this->getSearchProducts($model, $productFilter);
            $attributes = Attribute::all();
            $brands = [];

            foreach ($category->products()->with('brand')->get() as $product) {
                if (count($brands) == 0) {
                    $brands[] = $product->brand;
                }
                $checkUnique = true;
                foreach ($brands as $brand) {
                    if ($product->brand->id === $brand->id) {
                        $checkUnique = false;
                        break;
                    }
                }
                if ($checkUnique && $product->brand_id !== null) $brands[] = $product->brand;
            }

            $products = $category->products()->filterBrand($request->brand)
                ->filterCategory($request->category)
                ->filterContactPrice($request->contactPrice)
                ->sortBy($request->orderBy)
                ->price($fromPrice, $toPrice);

            foreach ($request->all() as $key => $req) {
                foreach ($attributes as $attribute) {
                    if ($attribute->slug == $key) {
                        foreach ($attribute->values as $value) {
                            if ($value->id == $req) {
                                $productsId = [];
                                foreach ($value->products()->get() as $attributeValue) {
                                    $productsId[] = $attributeValue->product_id;
                                }
                                $products = $products->whereIn('id', $productsId);
                            }
                        }
                    }
                }
            }

            $posts = Post::latest()->limit(8)->get();

            $products = $products->paginate(20);

            $productsArr = $products->toArray();

            $data = [
                'category' => $category,
                'products' => $products,
                'productsArr' => $productsArr,
                'brands' => $brands,
                'breadcrumb' => $breadcrumb,
                'featuredProducts' => $featuredProducts,
                'attributes' => Attribute::all(),
                'posts' => $posts
            ];

            SEO::setTitle($category->name);
            SEO::setDescription($category->name);
            SEOMeta::addKeyword($category->name);
            SEO::opengraph()->setUrl(url()->current());
            SEO::twitter()->setSite('https://fptcamera.com.vn');
            SEO::jsonLd()->addImage('https://fptcamera.com.vn/themes/anan/assets/images/2020/04/logo.jpg');

            return view('v2.product.category', $data);
        }

        $data['post'] = $post;
        SEO::setTitle($post->name);
        SEO::setDescription($post->name);
        SEOMeta::addKeyword($post->name);
        SEO::opengraph()->setUrl(url()->current());
        SEO::twitter()->setSite('https://fptcamera.com.vn');
        SEO::jsonLd()->addImage('https://fptcamera.com.vn/themes/anan/assets/images/2020/04/logo.jpg');
        return view('public.post.single', $data);
    }

    public function pageWithDisplayCategoryTheme($page)
    {
        $category = $page->categories()->firstOrFail();
        $request = request();

        $category->load('children', 'slider');

        $attributes = Attribute::all();
        $brands = Brand::all();

        $categories = Category::whereIn('id', $page->categories()->pluck('id'))
            ->get();

        $products = $category->products()
            ->filterBrand($request->brand)
            ->filterCategory($request->category)
            ->filterContactPrice($request->contactPrice)
            ->sortBy($request->orderBy)
            ->price($request->fromPrice, $request->toPrice);

        foreach ($request->all() as $key => $req) {
            foreach ($attributes as $attribute) {
                if ($attribute->slug == $key) {
                    foreach ($attribute->values as $value) {
                        if ($value->id == $req) {
                            $productsId = [];
                            foreach ($value->products()->get() as $attributeValue) {
                                $productsId[] = $attributeValue->product_id;
                            }
                            $products = $products->whereIn('id', $productsId);
                        }
                    }
                }
            }
        }

        $posts = Post::latest()->limit(8)->get();

        $products = $products->paginate(20);

        $productsArr = $products->toArray();

        $data = [
            'category' => $category,
            'categories' => $categories,
            'products' => $products,
            'productsArr' => $productsArr,
            'brands' => $brands,
            'attributes' => Attribute::all(),
            'posts' => $posts,
            'page' => $page
        ];

        return view('v2.product.page_category', $data);
    }

    public function ajaxCategory($slug, Request $request)
    {
        $category = Category::findBySlug($slug);

        $products = $category->products()->filterBrand($request->brand)
            ->filterCategory($request->category)
            ->filterContactPrice($request->contactPrice)
            ->sortBy($request->orderBy)
            ->price($request->fromPrice, $request->toPrice);

        $attributes = Attribute::all();

        foreach ($request->all() as $key => $req) {
            foreach ($attributes as $attribute) {
                if ($attribute->slug == $key) {
                    foreach ($attribute->values as $value) {
                        if ($value->id == $req) {
                            $productsId = [];
                            foreach ($value->products()->get() as $attributeValue) {
                                $productsId[] = $attributeValue->product_id;
                            }
                            $products = $products->whereIn('id', $productsId);
                        }
                    }
                }
            }
        }

        return $products->paginate(20);
    }

    public function ajaxAllCategory(Request $request)
    {
        $products = Product::filterBrand($request->brand)
            ->filterCategory($request->category)
            ->filterContactPrice($request->contactPrice)
            ->sortBy($request->orderBy ?? 'hot-sale')
            ->price($request->fromPrice, $request->toPrice);

        $attributes = Attribute::all();

        foreach ($request->all() as $key => $req) {
            foreach ($attributes as $attribute) {
                if ($attribute->slug == $key) {
                    foreach ($attribute->values as $value) {
                        if ($value->id == $req) {
                            $productsId = [];
                            foreach ($value->products()->get() as $attributeValue) {
                                $productsId[] = $attributeValue->product_id;
                            }
                            $products = $products->whereIn('id', $productsId);
                        }
                    }
                }
            }
        }

        return $products->paginate(20);
    }

    public function ajaxPageCategory($slug, Request $request)
    {
        $page = Page::whereSlug($slug)->firstOrFail();

        $category = $page->categories()->firstOrFail();

        $products = $category->products()
            ->filterBrand($request->brand)
            ->filterCategory($request->category)
            ->filterContactPrice($request->contactPrice)
            ->sortBy($request->orderBy ?? 'hot-sale')
            ->price($request->fromPrice, $request->toPrice);

        $attributes = Attribute::all();

        foreach ($request->all() as $key => $req) {
            foreach ($attributes as $attribute) {
                if ($attribute->slug == $key) {
                    foreach ($attribute->values as $value) {
                        if ($value->id == $req) {
                            $productsId = [];
                            foreach ($value->products()->get() as $attributeValue) {
                                $productsId[] = $attributeValue->product_id;
                            }
                            $products = $products->whereIn('id', $productsId);
                        }
                    }
                }
            }
        }

        return $products->paginate(20);
    }


    public function bestSale(Product $model, ProductFilter $productFilter, Request $request)
    {
        $request['sort'] = 'bestsale';
        $products = $this->getBestSaleProducts($model, $productFilter);

        $data = [
            'products' => $products
        ];

        return view('public.product.best_sale', $data);
    }

    public function bestSaleV2(Request $request)
    {
        $category = Category::findBySlug('san-pham-mua-nhieu');
        $category->load('children', 'slider');

        $attributes = Attribute::all();
        $brands = Brand::all();

        $searchCategories = [];
        $categories = Category::whereNotIn('id', [$category->id])
            ->with(['children'])
            ->whereIn('id', [12, 7, 18, 163, 159, 14, 15, 16])
            ->get();

        foreach ($categories as $cate) {
            foreach($cate->children as $childCate) {
                $searchCategories[] = $childCate;
            }
        }

        $products = Product::filterBrand($request->brand)
            ->filterCategory($request->category)
            ->filterContactPrice($request->contactPrice)
            ->sortBy($request->orderBy ?? 'hot-sale')
            ->price($request->fromPrice, $request->toPrice);

        foreach ($request->all() as $key => $req) {
            foreach ($attributes as $attribute) {
                if ($attribute->slug == $key) {
                    foreach ($attribute->values as $value) {
                        if ($value->id == $req) {
                            $productsId = [];
                            foreach ($value->products()->get() as $attributeValue) {
                                $productsId[] = $attributeValue->product_id;
                            }
                            $products = $products->whereIn('id', $productsId);
                        }
                    }
                }
            }
        }

        $posts = Post::latest()->limit(8)->get();

        $products = $products->paginate(20);

        $productsArr = $products->toArray();

        $data = [
            'category' => $category,
            'categories' => $searchCategories,
            'products' => $products,
            'productsArr' => $productsArr,
            'brands' => $brands,
            'attributes' => Attribute::all(),
            'posts' => $posts
        ];

        SEO::setTitle($category->meta->meta_title ?? 'Trang sản phẩm');
        SEO::setDescription($category->meta->meta_description);
        SEOMeta::addKeyword($category->meta->meta_keyword);
        SEO::opengraph()->setUrl(url()->current());
        SEO::twitter()->setSite('https://fptcamera.com.vn');
        SEO::jsonLd()->addImage('https://fptcamera.com.vn/themes/anan/assets/images/2020/04/logo.jpg');

        return view('v2.product.all_category', $data);
    }

    public function brand($slug)
    {
        $brand = Brand::findBySlug($slug);
		$products = $brand->products()->latest()->paginate($this->perPage);
        $data = [
            'brand' => $brand,
            'products' => $products
        ];

        return view('public.product.brand', $data);
    }

    public function postComment(PostCommentRequest $request)
    {
        $product = Product::findOrFail($request->product_id);
        $product->reviews()->create([
            'parent_id' => $request->parent_id ?? null,
            'reviewer_id' => auth()->id() ?? null,
            'rating' => $request->rating,
            'reviewer_name' => $request->name,
            'reviewer_email' => $request->email,
            'comment' => $request->comment,
        ]);

        return back();
    }

    private function getCategoryBreadCrumb(Collection $categories)
    {
        $breadcrumb = '';

        foreach ($categories as $category) {
            $breadcrumb .= "<a href='". route('product.category', ['slug' => $category->slug]) ."'>{$category->name}</a><span> » </span>";

            if ($category->items->isNotEmpty()) {
                $breadcrumb .= $this->getCategoryBreadCrumb($category->items);
            }
        }
        return $breadcrumb;
    }

    private function getCategoryBreadCrumbCat(Category $category)
    {
        $breadcrumb = '';
        if($category->parent)
        {
            $breadcrumb .= $this->getCategoryBreadCrumbCat($category->parent);
            $breadcrumb .= "<a href='". route('product.category', ['slug' => $category->parent->slug]) ."'>{$category->parent->name}</a><span> » </span>";
        }

        return $breadcrumb;
    }
  
  
    public function searchAjax(Request $request)
    {
        $keyword = $request->input('keyword');
        $products = Product::latest()
            ->whereHas('translations', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%');
            })
            ->limit(5)
            ->get();
        return response()->json([
            'products' => $products
        ], 200);
    }
}
