<?php

namespace Modules\Service\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;
use Modules\CategoryService\Entities\CategoryService;
use Modules\Area\Entities\Area;
class ServiceTabs extends Tabs
{
    public function make()
    {
        $this->group('basic_information', trans('service::services.tabs.group.basic_information'))
            ->active()
            ->add($this->general())
            ->add($this->price())
            ->add($this->images());
        $this->group('area_information', trans('service::services.tabs.group.area_information'))
            ->add($this->areas());
    }

    private function areas()
    {
        return tap(new Tab('area', trans('service::services.tabs.area')), function (Tab $tab) {
            $tab->weight(5);
            $tab->fields(['price_area']);
            $tab->view('service::admin.services.tabs.area', [
                'areas' => Area::all(),
            ]);
        });
    }

    private function general()
    {
        return tap(new Tab('general', trans('service::services.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(5);
            $tab->fields(['name', 'feature', 'bandwidth']);
            $tab->view('service::admin.services.tabs.general', [
                'categories_service' => CategoryService::treeList(),
            ]);
        });
    }

    private function price()
    {
        return tap(new Tab('price', trans('service::services.tabs.price')), function (Tab $tab) {
            $tab->weight(10);

            $tab->fields([
                'price',
            ]);

            $tab->view('service::admin.services.tabs.price');
        });
    }

    private function images()
    {
        if (! auth()->user()->hasAccess('admin.media.index')) {
            return;
        }

        return tap(new Tab('images', trans('service::services.tabs.images')), function (Tab $tab) {
            $tab->weight(20);
            $tab->view('service::admin.services.tabs.images');
        });
    }
}
