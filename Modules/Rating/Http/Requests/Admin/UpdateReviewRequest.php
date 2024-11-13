<?php

namespace Modules\Rating\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_name' => 'required|string',
            'customer_email' => 'nullable|email',
            'review' => 'required|string',
            'customer_phone' => 'nullable|string',
            'customer_gender' => 'required|string|in:male,female',
            'rating' => 'required|int|in:1,2,3,4,5',
            'type' => 'required|int|in:1,2,3',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
