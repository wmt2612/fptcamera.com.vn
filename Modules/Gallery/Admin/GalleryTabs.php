<?php

namespace Modules\Gallery\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;

class GalleryTabs extends Tabs
{
    public function make()
    {
        $this->group('basic_information', trans('gallery::galleries.tabs.basic_information'))
            ->active()
            ->add($this->general())
            ->add($this->images());

    }

    private function general()
    {
        return tap(new Tab('general', trans('gallery::galleries.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(5);
            $tab->fields(['name', 'description']);
            $tab->view('gallery::admin.galleries.tabs.general');
        });
    }

    private function images()
    {
        if (! auth()->user()->hasAccess('admin.media.index')) {
            return;
        }

        return tap(new Tab('images', trans('gallery::galleries.tabs.images')), function (Tab $tab) {
            $tab->weight(20);
            $tab->view('gallery::admin.galleries.tabs.images');
        });
    }
}
