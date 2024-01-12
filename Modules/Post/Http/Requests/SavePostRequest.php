<?php

namespace Modules\Post\Http\Requests;

use Illuminate\Validation\Rule;
use Modules\Post\Entities\Post;
use Modules\Core\Http\Requests\Request;

class SavePostRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'post::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => ['required'],
            'slug'          => $this->getSlugRules(),
            'content'       => ['required']
        ];
    }

    private function getSlugRules()
    {
        $rules = $this->route()->getName() === 'admin.posts.update'
        ? ['required']
        : ['nullable'];

        $slug = Post::withoutGlobalScope('active')->where('id', $this->id)->value('slug');

        $rules[] = Rule::unique('posts', 'slug')->ignore($slug, 'slug');

        return $rules;
    }
}
