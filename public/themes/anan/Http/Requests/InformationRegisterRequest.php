<?php

namespace Themes\anan\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationRegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => 'required|string|max:255',
            'phone'   => [
                'required',
                'regex:/^(0|\+84)(3[2-9]|5[689]|7[06-9]|8[1-9]|9\d)\d{7}$/'
            ],
            'address' => 'required|string|max:500',
            'email'   => 'nullable|email|max:255',
            'service' => 'required|string|max:255',
            'note'    => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'Vui lòng nhập họ và tên.',
            'phone.required'   => 'Vui lòng nhập số điện thoại.',
            'phone.regex'      => 'Số điện thoại không đúng định dạng Việt Nam.',
            'address.required' => 'Vui lòng nhập địa chỉ.',
            'email.email'      => 'Vui lòng nhập đúng định dạng email',
            'service.required' => 'Vui lòng nhập dịch vụ mà bạn quan tâm'
        ];
    }
}