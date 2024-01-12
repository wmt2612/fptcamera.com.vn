<?php

namespace Modules\Review\Admin;

use Modules\Admin\Ui\Tab;
use Modules\Admin\Ui\Tabs;

class ReviewQuestionTabs extends Tabs
{
    /**
     * Make new tabs with groups.
     *
     * @return void
     */
    public function make()
    {
        $this->group('review_questions_information', trans('review::review_questions.review_questions_information'))
            ->active()
            ->add($this->general());
    }

    private function general()
    {
        return tap(new Tab('general', trans('review::reviews.tabs.general')), function (Tab $tab) {
            $tab->active();
            $tab->weight(5);
            $tab->fields(['name']);
            $tab->view('review::admin.review_questions.tabs.general');
        });
    }
}
