<?php

namespace Modules\Comment\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class GetCommentListRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sort_by' => 'nullable|string|in:created_at,total_like',
            'sort_type' => 'nullable|string|in:desc,asc',
            'type' => 'required|int|in:1,2,3',
            'url' => 'required_if:type,1|string',
            'post_id' => 'required_if:type,2|int',
            'keyword' => 'nullable|string',
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
