<?php

namespace Modules\Comment\Sidebar;

use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Group;
use Modules\Admin\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
        $menu->group(trans('admin::sidebar.content'), function (Group $group) {
            $group->item(trans('comment::comments.comments'), function (Item $item) {
                $item->icon('fa fa-comment');
                $item->route('admin.comments.index');
                $item->weight(16);
                $item->authorize(
                    $this->auth->hasAnyAccess([
                        'admin.comments.index',
                    ])
                );
            });
        });
    }
}
