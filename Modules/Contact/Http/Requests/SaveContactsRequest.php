<?php

namespace Modules\Contact\Http\Requests;

use Modules\Core\Http\Requests\Request;

class SaveContactsRequest extends Request
{
    /**
     * Available attributes.
     *
     * @var string
     */
    protected $availableAttributes = 'contact::attributes';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|regex:/^\D*$/',
            // 'email' => 'email',
            'phone' => ['required', 'regex:/^[0][3|5|7|8|9][0-9]{8}$/'],
            'content' => 'max:500',
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'Thông tin này bắt buộc',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'content.max' => 'Max là 500 từ',
            'name.regex' => 'Chỉ được nhập chữ',
        ];
    }
}
