<?php

namespace Modules\Service\Http\Controllers\Admin;

// use Illuminate\Routing\Controller;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Service\Entities\Service;
use Modules\Service\Http\Requests\SaveServiceRequest;

class ServiceController
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'service::services.service';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'service::admin.services';

    /**
     * Form requests for the resource.
     *
     * @var array
     */
    protected $validation = SaveServiceRequest::class;

    // public function update($id)
    // {
    //     dd($this->getRequest('update')->all());

    //     $entity = $this->getEntity($id);

    //     $this->disableSearchSyncing();

    //     $entity->update(
    //         $this->getRequest('update')->all()
    //     );

    //     $this->searchable($entity);

    //     if (method_exists($this, 'redirectTo')) {
    //         return $this->redirectTo($entity)
    //             ->withSuccess(trans('admin::messages.resource_saved', ['resource' => $this->getLabel()]));
    //     }

    //     return redirect()->route("{$this->getRoutePrefix()}.index")
    //         ->withSuccess(trans('admin::messages.resource_saved', ['resource' => $this->getLabel()]));
    // }

    // public function store()
    // {
    //     dd($this->getRequest('store')->all());
    //     $this->disableSearchSyncing();

    //     $entity = $this->getModel()->create(
    //         $this->getRequest('store')->all()
    //     );

    //     $this->searchable($entity);

    //     if (method_exists($this, 'redirectTo')) {
    //         return $this->redirectTo($entity);
    //     }

    //     return redirect()->route("{$this->getRoutePrefix()}.index")
    //         ->withSuccess(trans('admin::messages.resource_saved', ['resource' => $this->getLabel()]));
    // }

}
