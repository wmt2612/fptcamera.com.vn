<?php

namespace Modules\Group\Sidebar;

use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Group;
use Modules\Admin\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
        $menu->group(trans('admin::sidebar.content'), function (Group $group) {
            $group->item(trans('post::sidebar.posts'), function (Item $item) {
                $item->item(trans('group::sidebar.groups'), function (Item $item) {
                    $item->weight(10);
                    $item->route('admin.groups.index');
                });
            });
        });
    }
}
