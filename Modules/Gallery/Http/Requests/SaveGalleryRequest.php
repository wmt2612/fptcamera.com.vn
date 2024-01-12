<?php

namespace Modules\Gallery\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveGalleryRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'gallery::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => ['required']
        ];
    }
}
