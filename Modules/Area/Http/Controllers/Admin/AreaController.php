<?php

namespace Modules\Area\Http\Controllers\Admin;

use Modules\Admin\Traits\HasCrudActions;
use Modules\Area\Entities\Area;
use Modules\Area\Http\Requests\SaveAreaRequest;

class AreaController
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Area::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'area::areas.area';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'area::admin.areas';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveAreaRequest::class;


}
