<?php

namespace Modules\Group\Http\Controllers\Admin;

use Modules\Group\Entities\Group;
use Modules\Group\Services\GroupTreeUpdater;
use Modules\Group\Http\Responses\GroupTreeResponse;

class GroupTreeController
{
    /**
     * Display Group tree in json.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::withoutGlobalScope('active')
            ->orderByRaw('-position DESC')
            ->get();

        return new GroupTreeResponse($groups);
    }

    /**
     * Update group tree in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        GroupTreeUpdater::update(request('group_tree'));

        return trans('group::messages.group_order_saved');
    }
}
