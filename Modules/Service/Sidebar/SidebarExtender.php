<?php

namespace Modules\Service\Sidebar;

use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Group;
use Modules\Admin\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
//         $menu->group(trans('admin::sidebar.content'), function (Group $group) {
//             $group->item(trans('service::services.services'), function (Item $item) {
//                 $item->icon('fa fa-dropbox');
//                 $item->weight(0);
//                 $item->authorize(
//                     $this->auth->hasAccess('admin.services.index')
//                 );

//                 $item->item(trans('service::services.services'), function (Item $item) {
//                     $item->weight(5);
//                     $item->route('admin.services.index');
//                     $item->authorize(
//                         $this->auth->hasAccess('admin.services.index')
//                     );
//                 });

// // append
//                 $item->item(trans('service::services.price_list'), function (Item $item) {
//                     $item->weight(5);
//                     $item->route('admin.price_list.index');
//                     // $item->authorize(
//                     //     $this->auth->hasAccess('admin.services.index')
//                     // );
//                 });

//             });
//         });
    }
}
