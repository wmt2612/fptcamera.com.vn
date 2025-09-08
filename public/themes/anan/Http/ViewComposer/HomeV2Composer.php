<?php

namespace Themes\Anan\Http\ViewComposer;

use Modules\Menu\MegaMenu\MegaMenu;
use Modules\Slider\Entities\Slider;
use Modules\Category\Entities\Category;
use Modules\Media\Entities\File;
use Modules\Product\Entities\Product;
use Illuminate\Support\Facades\Cache;

class HomeV2Composer
{
    /**
     * Thời gian cache (giây).
     * Mặc định 24h (86400s).
     */
    protected $cacheTime = 86400;

    public function compose($view)
    {
        $view->with(Cache::remember('homepage_composer', $this->cacheTime, function () {
            return [
                'homebanner01'     => $this->getBanner('homebanner01'),
                'homebanner01_url' => setting('homebanner01_url'),
                'homebanner02'     => $this->getBanner('homebanner02'),
                'homebanner02_url' => setting('homebanner02_url'),

                'dealSection'        => $this->getProductSection('home_deal'),
                'flashSaleSection'   => $this->getProductSection('home_flash_sale'),
                'j4uSection'         => $this->getProductSection('home_j4u'),
                'newestProductSection'=> $this->getProductSection('home_newest_product'),
                'customV1Section'    => $this->getProductSection('home_custom_v1'),
                'customSections'     => $this->getCustomSections(),

                'dealBanners' => Slider::findWithSlides(setting('home_deal_banners')),
                'homecate'    => $this->getHomeCate(),
            ];
        }));
    }

    private function getBanner($key)
    {
        if (setting($key)) {
            return $this->getMedia(setting($key))->path ?? null;
        }
        return null;
    }

    private function getMedia($fileId)
    {
        return Cache::rememberForever("files.{$fileId}", function () use ($fileId) {
            return File::findOrNew($fileId);
        });
    }

    private function getProductSection($prefix)
    {
        if (!setting("{$prefix}_is_active")) {
            return null;
        }

        $orderBy = setting("{$prefix}_sort_type") == 'ASC' ? 'ASC' : 'DESC';
        $limit   = setting("{$prefix}_item_limit", 10);
        $products = collect();
        $categories = collect();

        switch (setting("{$prefix}_get_item_by")) {
            case 'GET_BY_CATEGORY':
                if (is_array(setting("{$prefix}_category"))) {
                    $products = Product::with(['categories'])
                        ->whereHas('categories', function ($query) use ($prefix) {
                            $query->whereIn('categories.id', setting("{$prefix}_category"));
                        })
                        ->orderBy('created_at', $orderBy)
                        ->limit($limit)
                        ->get();

                    $categories = Category::whereIn('id', setting("{$prefix}_category"))->get();
                }
                break;

            case 'DEFAULT':
                $products = Product::with(['categories'])
                    ->orderBy('created_at', $orderBy)
                    ->limit($limit)
                    ->get();
                break;

            default:
                $products = Product::with(['categories'])
                    ->latest()
                    ->limit(10)
                    ->get();
                break;
        }

        return (object)[
            'title'           => setting("{$prefix}_title"),
            'desc'            => setting("{$prefix}_desc"),
            'view_more_link'  => setting("{$prefix}_view_more_link"),
            'view_more_title' => setting("{$prefix}_view_more_title"),
            'products'        => $products,
            'status'          => setting("{$prefix}_is_active"),
            'categories'      => $categories,
        ];
    }

    private function getCustomSections()
    {
        $sectionKeys = ['home_custom_v1', 'home_custom_v2', 'home_custom_v3', 'home_custom_v4', 'home_custom_v5'];

        $sections = [];
        foreach ($sectionKeys as $key) {
            $section = $this->getProductSection($key);
            if ($section) {
                $sections[] = $section;
            }
        }

        return $sections;
    }

    private function getHomeCate()
    {
        return Cache::remember('homepage_megamenu', $this->cacheTime, function () {
            return new MegaMenu(3);
        });
    }
}
