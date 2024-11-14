<?php

namespace Modules\Comment\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $user = $this->user();

        if ($user) {
            $this->merge([
                'user_id' => $user->id,
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'nullable|integer|exists:users,id',
            'content' => 'required|string',
            'type' => 'required|int|in:1,2,3',
            'url' => 'required_if:type,1|string',
            'post_id' => 'required_if:type,2|int',
            'customer_name' => 'required_without:user_id|string',
            'customer_gender' => 'required_without:user_id|string|in:male,female',
            'customer_email' => 'required_without:user_id|email',
            'customer_phone' => 'required_without:user_id|string',
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
