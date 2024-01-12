<?php

namespace Modules\Province\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveProvinceRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'province::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => ['required']
        ];
    }
}
