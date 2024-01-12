<?php

namespace Themes\Anan\Http\Requests;

use Modules\Core\Http\Requests\Request;
use Themes\Anan\Http\Rules\MinWordsRule;

class CheckoutRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', new MinWordsRule(2)],
            'email' => ['required', 'email'],
            'phone' => ['required'],
            // 'payment_method'  => ['required'],
            'address' => ['required'],
            'province' => ['required'],
            'district' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('anan::anan.error.name.required'),
            'email.required' => trans('anan::anan.error.email.required'),
            'email.email' => trans('anan::anan.error.email.email'),
            'phone.required' => trans('anan::anan.error.phone.required'),
            'payment_method.required' => trans('anan::anan.error.payment_method.required'),
            'province.required' => trans('anan::anan.error.province.required'),
            'district.required' => trans('anan::anan.error.district.required'),
        ];
    }
}
