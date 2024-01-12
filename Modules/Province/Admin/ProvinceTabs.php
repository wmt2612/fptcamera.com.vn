<?php

namespace Modules\Province\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;
use Modules\Area\Entities\Area;

class ProvinceTabs extends Tabs
{
    public function make()
    {
        $this->group('province_information', trans('province::provinces.tabs.group.province_information'))
            ->active()
            ->add($this->general());
    }

    private function general()
    {
        return tap(new Tab('general', trans('province::provinces.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(5);
            $tab->fields(['name']);
            $tab->view('province::admin.provinces.tabs.general', [
                'areas' => Area::treeList(),
            ]);
        });
    }
}
