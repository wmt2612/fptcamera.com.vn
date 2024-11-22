<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Order\Entities\Order;
use Modules\Order\Http\Requests\OrderTrackingRequest;

class OrderController
{
    public function orderTracking(OrderTrackingRequest $request)
    {
        $orderCode = $request->order_code;
        $order = Order::find($orderCode);
        return view('v2.order.tracking', compact('order'));
    }
}
