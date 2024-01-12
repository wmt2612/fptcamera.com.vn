<?php

namespace Modules\Service\Admin;

use Modules\Admin\Ui\AdminTable;
use Modules\Service\Entities\Service;

class ServiceTable extends AdminTable
{
    /**
     * Raw columns that will not be escaped.
     *
     * @var array
     */
    protected $rawColumns = ['price'];

    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable()
            ->editColumn('thumbnail', function ($service) {
                return view('admin::partials.table.image', [
                    'file' => $service->base_image,
                ]);
            })
            ->editColumn('price', function (Service $service) {
                return service_price_formatted($service, function ($price) use ($service) {
                    return "<span class='m-r-5'>{$price}</span>";
                });
            });
    }
}
