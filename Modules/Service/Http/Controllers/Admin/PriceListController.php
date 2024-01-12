<?php

namespace Modules\Service\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\CategoryService\Entities\CategoryService;
use Modules\Area\Entities\Area;
use Modules\Core\Entities\Province;
use Modules\Service\Entities\PriceList;
use Modules\Service\Entities\Service;
use Modules\Service\Http\Requests\UpdateAreaServicesRequest;

class PriceListController
{


    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = PriceList::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'service::services.price_list';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'service::admin.price_list';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    
    // protected $validation = SaveServiceRequest::class;

    public function index() {
        $areas = Area::all();
        $services = CategoryService::all();
        $provinces = Province::all();
        
        return view('service::admin.price_list.index', compact('areas', 'services', 'provinces'));
    }

    public function getProvinceArea(Request $request) {
        $area_province = Province::find($request->id_province)->areas()->get();
        return $area_province;
    }

    public function search(Request  $request) {
        
        $cate_services = CategoryService::query();
        if ($request->has('cate_services')) {
            $cate_services->where('id', $request->cate_services);
        }

        $data = $cate_services->first();
        $idService = $data->id;
        $services = Service::where('category_service_id', $idService)->get();
        
        return response()->json([
            'data'=> $services
        ]);
     
        
    }

    public function update(Request $request) {
        $price = $request->price_area;
        $idService = $request->service_id;
        $price_discount = (int)$request->price_sale;
        if ($request->type_area == "minus") {
            $request['price_area_discount'] = ($price - $price_discount);
        } else {
            $request['price_area_discount'] = ($price * $price_discount / 100);
        }

        $price_list = Service::find($idService);
        $arr_update = [
            'province_id' => (int)$request->provice_id,
            'price_area' => $request->price_area,
            'area_id' => $request->area_id,
            'type' => $request->type_area,
            'price_area_discount' => $request['price_area_discount'],
        ];
        $price_list->areas()->sync([
            $arr_update
        ]);

    }

}