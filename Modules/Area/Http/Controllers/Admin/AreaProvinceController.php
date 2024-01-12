<?php

namespace Modules\Area\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Area\Entities\Area;
use Modules\Area\Entities\AreaProvince;
use Modules\Area\Http\Requests\SaveAreaRequest;
use Modules\Core\Entities\Province;

class AreaProvinceController
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = AreaProvince::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'area::areas.area_province';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'area::admin.area-province';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveAreaRequest::class;

    public function show() 
    {
        $getAreaProvince = AreaProvince::all();
        // if ($getAreaProvince == null) {
        //     $getAreaProvince[];
        // }
        // dd();
        $provinces = Province::all();
        $areas = Area::all();
        return view('area::admin.area-province.index', [
            'areas' => $areas,
            'provinces' => $provinces,
            'getAreaProvince' => $getAreaProvince,
            ]);
    }

    public function checked(Request $request)
    {
        // dd($request->all());
        switch ($request->checked) {
            case true:
                if (AreaProvince::create($request->except('checked'))) {
                    $message = [
                        "message" => "OK",
                        "type" => "success"
                    ];
                } else {
                    $message = [
                        "message" => "Có lỗi xảy ra",
                        "type" => "error"
                    ];
                }
                return response()->json($message);
                break;
            case false:
                if (AreaProvince::where([
                    ['area_id' , $request->getArea],
                    ['province_id' , $request->getProvince],
                ])->delete()) {
                    $message = [
                        "message" => "OK",
                        "type" => "success"
                    ];
                } else {
                    $message = [
                        "message" => "Có lỗi xảy ra",
                        "type" => "error"
                    ];
                }
                return response()->json($message);
                break;
        }
    }

}
