<?php

namespace Modules\Lecturer\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;
use Modules\Tag\Entities\Tag;
use Modules\Brand\Entities\Brand;
use Modules\Tax\Entities\TaxClass;
use Modules\Category\Entities\Category;

class LecturerTabs extends Tabs
{
    public function make()
    {
        $this->group('basic_information', trans('lecturer::lecturers.tabs.group.basic_information'))
            ->active()
            ->add($this->general())
            ->add($this->contact_social())
            ->add($this->images());
    }

    private function general()
    {
        return tap(new Tab('general', trans('lecturer::lecturers.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(5);
            $tab->fields(['name', 'description', 'certificate', 'qualifications', 'is_active']);
            $tab->view('lecturer::admin.lecturers.tabs.general', [
            ]);
        });
    }

    private function contact_social()
    {
        return tap(new Tab('contact_social', trans('lecturer::lecturers.tabs.contact_social')), function (Tab $tab) {
            $tab->weight(5);
            $tab->fields(['phone', 'email', 'social_fb', 'social_zalo', 'social_twitter', 'social_instagram']);
            $tab->view('lecturer::admin.lecturers.tabs.contact_social', [
            ]);
        });
    }

    private function images()
    {
        if (! auth()->user()->hasAccess('admin.media.index')) {
            return;
        }

        return tap(new Tab('images', trans('lecturer::lecturers.tabs.images')), function (Tab $tab) {
            $tab->weight(20);
            $tab->view('lecturer::admin.lecturers.tabs.images');
        });
    }
}
