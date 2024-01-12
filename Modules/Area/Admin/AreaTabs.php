<?php

namespace Modules\Area\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;

class AreaTabs extends Tabs
{
    public function make()
    {
        $this->group('area_information', trans('area::areas.tabs.group.area_information'))
            ->active()
            ->add($this->general());
    }

    private function general()
    {
        return tap(new Tab('general', trans('area::areas.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(5);
            $tab->fields(['name']);
            $tab->view('area::admin.areas.tabs.general', [

            ]);
        });
    }

}
