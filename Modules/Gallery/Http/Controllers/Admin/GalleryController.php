<?php

namespace Modules\Gallery\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Gallery\Entities\Gallery;
use Modules\Gallery\Http\Requests\SaveGalleryRequest;

class GalleryController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Gallery::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'gallery::galleries.gallery';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'gallery::admin.galleries';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveGalleryRequest::class;
}
