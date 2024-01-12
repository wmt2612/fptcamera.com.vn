<?php

namespace Modules\Area\Admin;

use Modules\Admin\Ui\AdminTable;
use Modules\Area\Entities\Area;

class AreaProvinceTable extends AdminTable
{
    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable();
    }
}
