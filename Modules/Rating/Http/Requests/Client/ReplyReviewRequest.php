<?php

namespace Modules\Rating\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ReplyReviewRequest extends FormRequest
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
            'review' => 'required|string',
            'type' => 'required|int|in:1,2,3',
            'customer_gender' => 'required_without:user_id|string|in:male,female',
            'customer_name' => 'required_without:user_id|string',
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
