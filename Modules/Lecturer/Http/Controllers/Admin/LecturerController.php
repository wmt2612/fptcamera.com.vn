<?php

namespace Modules\Lecturer\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Lecturer\Entities\Lecturer;
use Modules\Lecturer\Http\Requests\SaveLecturerRequest;

class LecturerController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Lecturer::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'lecturer::lecturers.lecturer';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'lecturer::admin.lecturers';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveLecturerRequest::class;
}
