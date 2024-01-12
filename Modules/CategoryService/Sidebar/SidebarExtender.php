<?php

namespace Modules\CategoryService\Sidebar;

use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Group;
use Modules\Admin\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
        // $menu->group(trans('admin::sidebar.content'), function (Group $group) {
        //     $group->item(trans('service::services.services'), function (Item $item) {
        //         $item->item(trans('categoryservice::category_services.category_services'), function (Item $item) {
        //             $item->weight(27);
        //             $item->route('admin.category_services.index');
        //             $item->authorize(
        //                 $this->auth->hasAccess('admin.category_services.index')
        //             );
        //         });
        //     });
        // });
    }
}
