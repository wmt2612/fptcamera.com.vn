<?php

namespace Themes\Anan\Http\ViewComposer;

use Modules\Category\Entities\Category;

class AnanTabsComposer
{
     /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     * @return void
     */
    public function compose($view)
    {
        $view->with([
            'categories' => $this->getCategories(),
        ]);
    }

    private function getCategories()
    {
        return ['' => trans('admin::admin.form.please_select')] + Category::treeList();
    }
}
