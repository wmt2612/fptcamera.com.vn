<?php

namespace Modules\AutoLink\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveAutoLinkRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'autolink::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|string',
            'target_url' => 'required|max:255|string',
            'target_type' => 'required|max:255|in:_blank,_self,_parent,_top',
        ];
    }
}
