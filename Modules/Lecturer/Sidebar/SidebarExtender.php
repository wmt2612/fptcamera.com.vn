<?php

namespace Modules\Lecturer\Sidebar;

use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Group;
use Modules\Admin\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
        $menu->group(trans('admin::sidebar.content'), function (Group $group) {
            $group->item(trans('lecturer::lecturers.lecturers'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(0);
                $item->authorize(
                    /* append */
                );

                $item->item(trans('lecturer::lecturers.lecturers'), function (Item $item) {
                    $item->weight(5);
                    $item->route('admin.lecturers.index');
                    $item->authorize(
                        $this->auth->hasAccess('admin.lecturers.index')
                    );
                });

// append

            });
        });
    }
}
