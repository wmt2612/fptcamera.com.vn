<?php

namespace Modules\Lecturer\Admin;

use Modules\Admin\Ui\AdminTable;
use Modules\Lecturer\Entities\Lecturer;

class LecturerTable extends AdminTable
{
    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable()
        ->editColumn('logo', function ($lecturer) {
            return view('admin::partials.table.image', [
                'file' => $lecturer->base_image,
            ]);
        });
    }
}
