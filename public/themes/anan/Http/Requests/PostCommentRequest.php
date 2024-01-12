<?php

namespace Themes\Anan\Http\Requests;

use Modules\Core\Http\Requests\Request;

class PostCommentRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'anan::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required'],
            'comment' => ['required'],
            'rating' => ['required'],
        ];
    }
}
