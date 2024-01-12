<?php

namespace Modules\CategoryService\Http\Requests;

use Modules\Core\Http\Requests\Request;
use Illuminate\Validation\Rule;
use Modules\CategoryService\Entities\CategoryService;

class SaveCategoryServiceRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'categoryservice::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'name' => 'required',
            'slug' => $this->getSlugRules()
        ];
    }

    private function getSlugRules()
    {
        $rules = $this->route()->getName() === 'admin.category_services.update'
            ? ['required']
            : ['nullable'];

        $slug = CategoryService::withoutGlobalScope('active')->where('id', $this->id)->value('slug');

        $rules[] = Rule::unique('category_services', 'slug')->ignore($slug, 'slug');

        return $rules;
    }
}
