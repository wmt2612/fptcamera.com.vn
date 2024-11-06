<?php

namespace Modules\AutoLink\Admin;

use Modules\Admin\Ui\AdminTable;
use Modules\AutoLink\Entities\AutoLink;

class AutoLinkTable extends AdminTable
{
    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable()
            ->addColumn('logo', function (AutoLink $brand) {

            });
    }
}
