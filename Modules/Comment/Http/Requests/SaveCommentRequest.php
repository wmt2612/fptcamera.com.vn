<?php

namespace Modules\Comment\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveCommentRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'comment::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }
}
