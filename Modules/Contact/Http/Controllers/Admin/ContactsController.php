<?php

namespace Modules\Contact\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Contact\Entities\Contacts;
use Modules\Contact\Http\Requests\SaveContactsRequest;

class ContactsController extends Controller
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Contacts::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'contact::contacts.contacts';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'contact::admin.contacts';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    // protected $validation = SaveContactsRequest::class;
}
