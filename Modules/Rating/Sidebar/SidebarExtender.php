<?php

namespace Modules\Rating\Sidebar;

use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Group;
use Modules\Admin\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
        $menu->group(trans('admin::sidebar.content'), function (Group $group) {
            $group->item(trans('rating::sidebar.ratings'), function (Item $item) {
                $item->icon('fa fa-star');
                $item->weight(15);
                $item->route('admin.ratings.index');
                $item->authorize(
                    $this->auth->hasAnyAccess([
                        'admin.ratings.index',
                    ])
                );
            });
        });
    }
}
