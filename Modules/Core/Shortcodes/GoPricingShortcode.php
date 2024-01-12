<?php

namespace Modules\Core\Shortcodes;
use Modules\CategoryService\Entities\CategoryService;
use Modules\Area\Entities\AreaProvince;
use Modules\Province\Entities\Province;

class GoPricingShortcode
{

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {

        $data['shortcode'] = $shortcode;
        $data['provinces'] = Province::all()->pluck('name', 'id');

        if($shortcode->cat_id){
            $data['services'] = CategoryService::findOrFail($shortcode->cat_id)->services()->get();
        }else{
            $data['services'] = CategoryService::findOrFail(5)->services()->get();
        }

        $data['area_id'] = null;
        $getAreaId = AreaProvince::where('province_id', $shortcode->provinces_id)
        ->pluck('area_id')
        ->toArray();
        if($getAreaId != null){
            $data['area_id'] = $getAreaId;
        }


        return view('public.shortcode.go_pricing', $data);
        // }
    }

}
