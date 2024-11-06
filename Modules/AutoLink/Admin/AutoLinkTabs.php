<?php

namespace Modules\AutoLink\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;

class AutoLinkTabs extends Tabs
{
    public function make()
    {
        $this->group('auto_links_information', trans('autolink::auto_links.tabs.group.auto_links_information'))
            ->active()
            ->add($this->general());
    }

    private function general()
    {
        return tap(new Tab('general', trans('autolink::auto_links.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(1);
            $tab->fields(['title', 'target_url', 'target_type']);
            $targetTypes = [
                '_blank' => trans('autolink::auto_links.form.target_blank'),
                '_self' => trans('autolink::auto_links.form.target_self'),
                '_parent' => trans('autolink::auto_links.form.target_parent'),
                '_top' => trans('autolink::auto_links.form.target_top'),
            ];
            $tab->view('autolink::admin.auto_links.tabs.general', compact('targetTypes'));
        });
    }
}
