<?php

namespace Modules\Tagp\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Tagp\Entities\PostTag;
use Modules\Tagp\Http\Requests\SavePostTagRequest;

class PostTagController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = PostTag::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'tagp::post_tags.post_tag';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'tagp::admin.post_tags';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SavePostTagRequest::class;
}
