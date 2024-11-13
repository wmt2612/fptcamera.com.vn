<?php

namespace Modules\Rating\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class SeedingReplyReviewRequest extends FormRequest
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
            'customer_email' => 'required|email',
            'review' => 'required|string',
            'customer_phone' => 'required|string',
            'customer_gender' => 'required|string|in:male,female',
            'type' => 'required|int|in:0,1'
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
