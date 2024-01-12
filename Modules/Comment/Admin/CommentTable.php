<?php

namespace Modules\Comment\Admin;

use Modules\Admin\Ui\AdminTable;

class CommentTable extends AdminTable
{
    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable()
            ->editColumn('status', function ($review) {
                return $review->is_approved
                    ? '<span class="dot green"></span>'
                    : '<span class="dot red"></span>';
            });
    }
}
