<?php

namespace Modules\Tagp\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Tagp\Entities\TagP;
use Modules\Tagp\Http\Requests\SaveTagPRequest;

class TagPController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = TagP::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'tagp::tag_ps.tag_p';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'tagp::admin.tag_ps';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveTagPRequest::class;
}
