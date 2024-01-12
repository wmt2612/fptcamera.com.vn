<?php

namespace Modules\CategoryService\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\CategoryService\Entities\CategoryService;
use Modules\CategoryService\Http\Requests\SaveCategoryServiceRequest;

class CategoryServiceController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = CategoryService::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'categoryservice::category_services.category_service';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'categoryservice::admin.category_services';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveCategoryServiceRequest::class;


     /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CategoryService::with('files', 'meta')->withoutGlobalScope('active')->find($id);
    }

    /**
     * Destroy resources by given ids.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryService::withoutGlobalScope('active')
            ->findOrFail($id)
            ->delete();

        return back()->withSuccess(trans('admin::messages.resource_deleted', ['resource' => $this->getLabel()]));
    }
}
