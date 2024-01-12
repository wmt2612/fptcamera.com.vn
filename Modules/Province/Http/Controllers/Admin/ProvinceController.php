<?php

namespace Modules\Province\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Province\Entities\Province;
use Modules\Province\Http\Requests\SaveProvinceRequest;

class ProvinceController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Province::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'province::provinces.province';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'province::admin.provinces';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveProvinceRequest::class;
}
