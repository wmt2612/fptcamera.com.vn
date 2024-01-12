<?php

namespace Modules\Group\Http\Controllers\Admin;

use Modules\Admin\Traits\HasCrudActions;
use Modules\Group\Entities\Group;

class GroupController 
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Group::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'group::groups.group';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'group::admin.groups';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    // protected $validation = SaveCategoryRequest::class;

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        return Group::withoutGlobalScope('active')->find($id);
    }

    /**
     * Destroy resources by given ids.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Group::withoutGlobalScope('active')
            ->findOrFail($id)
            ->delete();

        return back()->withSuccess(trans('admin::messages.resource_deleted', ['resource' => $this->getLabel()]));
    }
}
