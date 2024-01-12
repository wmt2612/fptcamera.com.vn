<?php

namespace Modules\Page\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required|regex:/^\D+$/|min:2|max:50',
            'phonenumber' => 'required|regex:/^[0][0-9]{9}$/',
            'provinces' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'housenumber' => 'required',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

     public function messages()
     {
         return [
             'required' => 'Vui lòng không để trống :attribute',
             'regex' => 'Dữ liệu không hợp lệ',
             'min' => 'Tên ít nhất 2 từ',
             'max' => 'Tên nhiều nhất chỉ 50 từ',
         ];
     }

     public function attributes()
     {
         return [
         'fullname' => 'Họ và tên',
         'phonenumber' => 'Số điện thoại',
         'provinces' => 'Thành phố',
         'district' => 'Quận/Huyện',
         'ward' => 'Dịch vụ',
         'housenumber' => 'Địa chỉ',
         ];
     }
    public function authorize()
    {
        return true;
    }
}
