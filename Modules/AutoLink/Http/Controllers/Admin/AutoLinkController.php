<?php

namespace Modules\AutoLink\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\AutoLink\Entities\AutoLink;
use Modules\AutoLink\Http\Requests\SaveAutoLinkRequest;

class AutoLinkController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = AutoLink::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'autolink::auto_links.auto_link';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'autolink::admin.auto_links';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveAutoLinkRequest::class;
}
