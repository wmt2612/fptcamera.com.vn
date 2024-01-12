<?php

namespace Modules\Lecturer\Http\Requests;

use Modules\Core\Http\Requests\Request;
use Modules\Lecturer\Entities\Lecturer;
use Illuminate\Validation\Rule;
class SaveLecturerRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'lecturer::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => $this->getSlugRules(),
            'name' => 'required',
            'is_active' => 'required|boolean',
        ];
    }

    private function getSlugRules()
    {
        $rules = $this->route()->getName() === 'admin.lecturers.update'
            ? ['required']
            : ['sometimes'];

        $slug = Lecturer::withoutGlobalScope('active')->where('id', $this->id)->value('slug');

        $rules[] = Rule::unique('lecturers', 'slug')->ignore($slug, 'slug');

        return $rules;
    }
}
