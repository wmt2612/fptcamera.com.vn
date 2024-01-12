<?php

namespace Modules\Service\Http\Requests;

use Modules\Core\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateAreaServicesRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'service::attributes';
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'provinces' => 'required',
            'areas' => 'required',
            'cate_services' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'provinces.required' => 'Vui lòng không được để trống!',
            'areas.required' => 'Vui lòng không được để trống!',
            'cate_services.required' => 'Vui lòng không được để trống!'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $messages = $validator->errors()->messages();
        foreach ($messages as $data) {
            throw new HttpResponseException(response()->json(['type' => 'error','messages' => $data[0]]));
        }
    }
}
