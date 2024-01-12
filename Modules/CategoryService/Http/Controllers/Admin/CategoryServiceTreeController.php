<?php

namespace Modules\CategoryService\Http\Controllers\Admin;

use Modules\CategoryService\Entities\CategoryService;
use Modules\CategoryService\Http\Responses\CategoryServiceTreeResponse;
use Modules\CategoryService\Services\CategoryServiceTreeUpdater;

class CategoryServiceTreeController
{
    /**
     * Display Group tree in json.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_services = CategoryService::withoutGlobalScope('active')
            ->orderByRaw('-position DESC')
            ->get();

        return new CategoryServiceTreeResponse($category_services);
    }

    /**
     * Update group tree in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        CategoryServiceTreeUpdater::update(request('categoryservice_tree'));

        return trans('categoryservice::messages.categoryservice_order_saved');
    }
}
