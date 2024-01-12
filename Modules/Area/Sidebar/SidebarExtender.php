<?php

namespace Modules\Area\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Admin\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
//         $menu->group(trans('admin::sidebar.content'), function (Group $group) {
//             $group->item(trans('area::areas.areas'), function (Item $item) {
//                 $item->icon('fa fa-copy');
//                 $item->weight(0);
//                 $item->authorize(
//                     /* append */
//                 );

//                 $item->item(trans('area::areas.areas'), function (Item $item) {
//                     $item->weight(5);
//                     $item->route('admin.areas.index');
//                     $item->authorize(
//                         $this->auth->hasAccess('admin.areas.index')
//                     );
//                 });
//                 $item->item(trans('area::areas.area_province'), function (Item $item) {
//                     $item->weight(5);
//                     $item->route('admin.areas.area_province');
//                     $item->authorize(
//                         $this->auth->hasAccess('admin.areas.index')
//                     );
//                 });

// // append

//             });
//         });
    }
}
