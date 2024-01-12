<?php

namespace Modules\Area\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveAreaRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'area::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => ['required'],
        ];
    }
}
