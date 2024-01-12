<?php

namespace Modules\Core\Shortcodes;
use Modules\Province\Entities\Province;
use Modules\CategoryService\Entities\CategoryService;
use Modules\Area\Entities\AreaProvince;

class InternetFPTShortcode
{

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {

        $data['provinces'] = Province::all()->pluck('name', 'id');

        $data['category_services_1'] = CategoryService::findOrFail(5)->services()->get();
        $data['category_services_2'] = CategoryService::findOrFail(6)->services()->get();

        $data['area_id'] = null;
        if(request()->has('locationId')){
            $getAreaId = AreaProvince::where('province_id', request()->get('locationId'))
            ->pluck('area_id')
            ->toArray();
            if($getAreaId != null){
                $data['area_id'] = $getAreaId;
            }
        }
        $data['services'] = $data['category_services_1']
        ->merge($data['category_services_2']);


        return view('public.shortcode.internet_fpt', $data);
    }

}
