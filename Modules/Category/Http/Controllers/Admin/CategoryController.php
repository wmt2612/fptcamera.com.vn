<?php

namespace Modules\Category\Http\Controllers\Admin;

use Modules\Category\Entities\Category;
use Modules\Slider\Entities\Slider;
use Modules\Admin\Traits\HasCrudActions;
use Modules\Category\Http\Requests\SaveCategoryRequest;
use Illuminate\Http\Request;

class CategoryController
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'category::categories.category';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'category::admin.categories';

    /**
     * Form requests for the resource.
     *
     * @var array|string
     */
    protected $validation = SaveCategoryRequest::class;

    public function index(Request $request)
    {
        if ($request->has('query')) {
            return $this->getModel()
                ->search($request->get('query'))
                ->query()
                ->limit($request->get('limit', 10))
                ->get();
        }

        if ($request->has('table')) {
            return $this->getModel()->table($request);
        }

        $sliders = Slider::all();

        return view("{$this->viewPath}.index", compact('sliders'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Category::with('files', 'meta', 'slider')->withoutGlobalScope('active')->find($id);
    }

    /**
     * Destroy resources by given ids.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::withoutGlobalScope('active')
            ->findOrFail($id)
            ->delete();

        return back()->withSuccess(trans('admin::messages.resource_deleted', ['resource' => $this->getLabel()]));
    }

    public function ajaxSlug()
    {
        $name = request()->get('name');
        $category_id = request()->get('category_id');

        $slug = str_slug($name) ?: slugify($name);

        if($category_id != 0)
        {
            $slug_current = $this->getModel()->where('id', $category_id)->first()->slug;
            if($slug_current == $slug)
            {
                return $slug_current;
            }
        }

        $query = $this->getModel()->where('slug', $slug)->withoutGlobalScope('active');

        if ($query->exists()) {
            $slug .= '-' . str_random(8);
        }

        return $slug;
    }
}
