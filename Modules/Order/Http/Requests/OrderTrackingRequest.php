<?php

namespace Modules\Order\Http\Requests;

use Modules\Core\Http\Requests\Request;

class OrderTrackingRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order_code' => 'nullable|exists:orders,id',
        ];
    }

    public function messages()
    {
        return [
            'order_code.required' => 'Vui lòng nhập mã đơn hàng của bạn',
            'order_code.exists' => 'Mã đơn hàng không tồn tại hoặc đã bị hủy'
        ];
    }
}
