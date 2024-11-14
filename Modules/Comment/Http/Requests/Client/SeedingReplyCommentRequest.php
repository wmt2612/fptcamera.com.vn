<?php

namespace Modules\Comment\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class SeedingReplyCommentRequest extends FormRequest
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
            'content' => 'required|string',
            'customer_phone' => 'required|string',
            'customer_gender' => 'required|string|in:male,female',
            'type' => 'required|int|in:1,2',
            'url' => 'required_if:type,1|string',
            'post_id' => 'required_if:type,2',
            'reply_to' => 'required|int|exists:comments,id'
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
