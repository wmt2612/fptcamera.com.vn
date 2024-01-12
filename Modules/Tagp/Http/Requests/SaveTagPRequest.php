<?php

namespace Modules\Tagp\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveTagPRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'tagp::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required'
        ];
    }
}
