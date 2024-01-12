<?php

namespace Modules\Post\Admin;

use Modules\Admin\Ui\AdminTable;
use Modules\Post\Entities\Post;

class PostTable extends AdminTable
{
    /**
     * Make table response for the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function make()
    {
        return $this->newTable()
            ->addColumn('logo', function (Post $post) {
                 if($post->wordpress_thumbnail) {
                    return view('admin::partials.table.image_v2', [
                        'path' => $post->thumbnail(),
                    ]);
                }
                return view('admin::partials.table.image', [
                    'file' => $post->logo,
                ]);
            });
    }
}
