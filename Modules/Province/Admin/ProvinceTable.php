<?php

namespace Modules\Province\Admin;

use Modules\Admin\Ui\AdminTable;
use Modules\Province\Entities\Province;

class ProvinceTable extends AdminTable
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
