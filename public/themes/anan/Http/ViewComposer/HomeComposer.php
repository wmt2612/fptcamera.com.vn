<?php

namespace Themes\Anan\Http\ViewComposer;

use Modules\Menu\MegaMenu\MegaMenu;
use Themes\Anan\Banner;
use Themes\Anan\Feature;
use Modules\Brand\Entities\Brand;
use Illuminate\Support\Collection;
use Modules\Slider\Entities\Slider;
use Illuminate\Support\Facades\Cache;
use Modules\Category\Entities\Category;
use Modules\Media\Entities\File;
use Modules\Product\Entities\Product;

class HomeComposer
{
    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose($view)
    {
        $view->with([
            'homebanner01' => $this->getHomeBanner01(),
            'homebanner01_url' => $this->getHomeBanner01URL(),
            'homebanner02' => $this->getHomeBanner02(),
            'homebanner02_url' => $this->getHomeBanner02URL(),
            'dealSection' => $this->getDealBox(),
            'flashSaleSection' => $this->getFlashSaleBox(),
            'j4uSection' => $this->getJustForYouSection(),
            'newestProductSection' => $this->getNewestProductSection(),
            'customSections' => $this->getCustomSections(),
            'customV1Section' => $this->getCustomV1Section(),
            'dealBanners' => Slider::findWithSlides(setting('home_deal_banners')),
            'homecate' => $this->getHomeCate(),
        ]);
    }

    private function getHomeBanner01()
    {
        if (setting('homebanner01')) {
            return $this->getMedia(setting('homebanner01'))->path;
        }
        return;
    }

    private function getHomeBanner01URL()
    {
        if (setting('homebanner01_url')) {
            return setting('homebanner01_url');
        }
        return;
    }

    private function getHomeBanner02()
    {
        if (setting('homebanner02')) {
            return $this->getMedia(setting('homebanner02'))->path;
        }
        return;
    }

    private function getHomeBanner02URL()
    {
        if (setting('homebanner02_url')) {
            return setting('homebanner02_url');
        }
        return;
    }


    private function getMedia($fileId)
    {
        return Cache::rememberForever(md5("files.{$fileId}"), function () use ($fileId) {
            return File::findOrNew($fileId);
        });
    }

    private function getDealBox()
    {
        $products = [];
        $orderBy = setting('home_deal_sort_type') == 'ASC' ? 'ASC' : 'DESC';
        $categories = [];
        switch (setting('home_deal_get_item_by')) {
            case 'GET_BY_CATEGORY':
                if (is_array(setting('home_deal_category'))) {
                    $products = Product::whereHas('categories', function ($query) {
                        $query->whereIn('categories.id', setting('home_deal_category'));
                    })
                        ->orderBy('created_at', $orderBy)
                        ->limit(setting('home_deal_item_limit'))
                        ->get();

                    $categories = Category::whereIn('id', setting('home_deal_category'))->get();
                }
                break;
            case 'DEFAULT':
                $products = Product::limit(setting('home_deal_item_limit'))
                    ->orderBy('created_at', $orderBy)
                    ->get();
                break;
            default:
                $products = Product::limit(10)->latest()->get();
                break;
        }
        return (object)[
            'title' => setting('home_deal_title'),
            'desc' => setting('home_deal_desc'),
            'view_more_link' => setting('home_deal_view_more_link'),
            'view_more_title' => setting('home_deal_view_more_title'),
            'products' => $products,
            'status' => setting('home_deal_is_active'),
            'categories' => $categories
        ];
    }

    private function getJustForYouSection()
    {
        $products = [];
        $orderBy = setting('home_j4u_sort_type') == 'ASC' ? 'ASC' : 'DESC';
        $categories = [];
        switch (setting('home_j4u_get_item_by')) {
            case 'GET_BY_CATEGORY':
                if (is_array(setting('home_j4u_category'))) {
                    $products = Product::whereHas('categories', function ($query) {
                        $query->whereIn('categories.id', setting('home_j4u_category'));
                    })
                        ->orderBy('created_at', $orderBy)
                        ->limit(setting('home_j4u_item_limit'))
                        ->get();

                    $categories = Category::whereIn('id', setting('home_j4u_category'))->get();
                }
                break;
            case 'DEFAULT':
                $products = Product::limit(setting('home_j4u_item_limit'))
                    ->orderBy('created_at', $orderBy)
                    ->get();
                break;
            default:
                $products = Product::limit(10)->latest()->get();
                break;
        }
        return (object)[
            'title' => setting('home_j4u_title'),
            'desc' => setting('home_j4u_desc'),
            'view_more_link' => setting('home_j4u_view_more_link'),
            'view_more_title' => setting('home_j4u_view_more_title'),
            'products' => $products,
            'status' => setting('home_j4u_is_active'),
            'categories' => $categories
        ];
    }

    private function getNewestProductSection()
    {
        $products = [];
        $orderBy = setting('home_newest_product_sort_type') == 'ASC' ? 'ASC' : 'DESC';
        $categories = [];
        switch (setting('home_newest_product_get_item_by')) {
            case 'GET_BY_CATEGORY':
                if (is_array(setting('home_newest_product_category'))) {
                    $products = Product::whereHas('categories', function ($query) {
                        $query->whereIn('categories.id', setting('home_newest_product_category'));
                    })
                        ->orderBy('created_at', $orderBy)
                        ->limit(setting('home_newest_product_item_limit'))
                        ->get();

                    $categories = Category::whereIn('id', setting('home_newest_product_category'))->get();
                }
                break;
            case 'DEFAULT':
                $products = Product::limit(setting('home_newest_product_item_limit'))
                    ->orderBy('created_at', $orderBy)
                    ->get();
                break;
            default:
                $products = Product::limit(10)->latest()->get();
                break;
        }
        return (object)[
            'title' => setting('home_newest_product_title'),
            'desc' => setting('home_newest_product_desc'),
            'view_more_link' => setting('home_newest_product_view_more_link'),
            'view_more_title' => setting('home_newest_product_view_more_title'),
            'products' => $products,
            'status' => setting('home_newest_product_is_active'),
            'categories' => $categories
        ];
    }

    private function getCustomV1Section()
    {
        $products = [];
        $orderBy = setting('home_custom_v1_sort_type') == 'ASC' ? 'ASC' : 'DESC';
        $categories = [];
        switch (setting('home_custom_v1_get_item_by')) {
            case 'GET_BY_CATEGORY':
                if (is_array(setting('home_custom_v1_category'))) {
                    $products = Product::whereHas('categories', function ($query) {
                        $query->whereIn('categories.id', setting('home_custom_v1_category'));
                    })
                        ->orderBy('created_at', $orderBy)
                        ->limit(setting('home_custom_v1_item_limit'))
                        ->get();

                    $categories = Category::whereIn('id', setting('home_custom_v1_category'))->get();
                }
                break;
            case 'DEFAULT':
                $products = Product::limit(setting('home_custom_v1_item_limit'))
                    ->orderBy('created_at', $orderBy)
                    ->get();
                break;
            default:
                $products = Product::limit(10)->latest()->get();
                break;
        }
        return (object)[
            'title' => setting('home_custom_v1_title'),
            'desc' => setting('home_custom_v1_desc'),
            'view_more_link' => setting('home_custom_v1_view_more_link'),
            'view_more_title' => setting('home_custom_v1_view_more_title'),
            'products' => $products,
            'status' => setting('home_custom_v1_is_active'),
            'categories' => $categories
        ];
    }

    private function getCustomSections()
    {
        $sectionKeys = [
            'home_custom_v1',
            'home_custom_v2',
            'home_custom_v3',
            'home_custom_v4',
            'home_custom_v5',
        ];
        $sections = [];

       foreach ($sectionKeys as $sectionKey) {
           $uniqueKey = $sectionKey;
           if(!setting("{$uniqueKey}_is_active")) {
                continue;
           }
           $products = [];
           $orderBy = setting("{$uniqueKey}_sort_type") == 'ASC' ? 'ASC' : 'DESC';
           $categories = [];
           switch (setting("{$uniqueKey}_get_item_by")) {
               case 'GET_BY_CATEGORY':
                   if (is_array(setting("{$uniqueKey}_category"))) {
                       $products = Product::whereHas('categories', function ($query) use($uniqueKey){
                           $query->whereIn('categories.id', setting("{$uniqueKey}_category"));
                       })
                           ->orderBy('created_at', $orderBy)
                           ->limit(setting("{$uniqueKey}_item_limit"))
                           ->get();

                       $categories = Category::whereIn('id', setting("{$uniqueKey}_category"))->get();
                   }
                   break;
               case 'DEFAULT':
                   $products = Product::limit(setting("{$uniqueKey}_item_limit"))
                       ->orderBy('created_at', $orderBy)
                       ->get();
                   break;
               default:
                   $products = Product::limit(10)->latest()->get();
                   break;
           }
           $sections[] = (object)[
               'title' => setting("{$uniqueKey}_title"),
               'desc' => setting("{$uniqueKey}_desc"),
               'view_more_link' => setting("{$uniqueKey}_view_more_link"),
               'view_more_title' => setting("{$uniqueKey}_view_more_title"),
               'products' => $products,
               'status' => setting("{$uniqueKey}_is_active"),
               'categories' => $categories
           ];
       }

       return $sections;
    }

    private function getFlashSaleBox()
    {
        $products = [];
        $orderBy = setting('home_flash_sale_sort_type') == 'ASC' ? 'ASC' : 'DESC';
        switch (setting('home_flash_sale_get_item_by')) {
            case 'GET_BY_CATEGORY':
                if (is_array(setting('home_flash_sale_category'))) {
                    $products = Product::whereHas('categories', function ($query) {
                        $query->whereIn('categories.id', setting('home_flash_sale_category'));
                    })
                        ->orderBy('created_at', $orderBy)
                        ->limit(setting('home_flash_sale_item_limit'))
                        ->get();
                }
                break;
            case 'DEFAULT':
                $products = Product::limit(setting('home_flash_sale_item_limit'))
                    ->orderBy('created_at', $orderBy)
                    ->get();
                break;
            default:
                $products = Product::limit(10)->latest()->get();
                break;
        }
        return (object)[
            'title' => setting('home_flash_sale_title'),
            'desc' => setting('home_flash_sale_desc'),
            'view_more_link' => setting('home_flash_sale_view_more_link'),
            'view_more_title' => setting('home_flash_sale_view_more_title'),
            'products' => $products,
            'status' => setting('home_flash_sale_is_active')
        ];
    }

    private function getHomeCate()
    {
        return new MegaMenu(3);
    }

}
