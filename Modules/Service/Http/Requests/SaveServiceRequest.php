<?php

namespace Modules\Service\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveServiceRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'service::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'feature' => 'required'
        ];
    }
}
