<?php

namespace Modules\Core\Shortcodes;

use Modules\Area\Entities\AreaProvince;
use Modules\CategoryService\Entities\CategoryService;
use Modules\Province\Entities\Province;

class PriceComboShortcode
{

    public function register($shortcode, $content, $compiler, $name, $viewData)
    {

        $data['provinces'] = Province::all()->pluck('name', 'id');

        $data['services'] = CategoryService::findOrFail(7)->services()->get();

        $data['area_id'] = null;
        if (request()->has('locationId')) {
            $getAreaId = AreaProvince::where('province_id', request()->get('locationId'))
                ->pluck('area_id')
                ->toArray();
            if ($getAreaId != null) {
                $data['area_id'] = $getAreaId;
            }
        }

        return view('public.shortcode.price_combo', $data);
    }

}
