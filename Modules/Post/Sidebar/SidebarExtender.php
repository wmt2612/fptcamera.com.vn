<?php
namespace Modules\Post\Sidebar;

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
                $item->icon('fa fa-cube');
                $item->weight(10);
                $item->route('admin.posts.index');

                $item->item(trans('post::sidebar.add_new'), function (Item $item) {
                    $item->weight(5);
                    $item->route('admin.posts.create');
                });

                $item->item(trans('post::sidebar.catalog_post'), function (Item $item) {
                    $item->weight(5);
                    $item->route('admin.posts.index');
                });

            });
        });
    }
}
