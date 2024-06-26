<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Modules\Cart\Facades\Cart;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Routing\Controller;
use Modules\Coupon\Checkers\MaximumSpend;
use Modules\Coupon\Checkers\MinimumSpend;
use Modules\Cart\Http\Requests\StoreCartItemRequest;
use Modules\Coupon\Exceptions\MaximumSpendException;
use Modules\Coupon\Exceptions\MinimumSpendException;
use Modules\Cart\Http\Middleware\CheckProductIsInStock;
use Illuminate\Http\Request;
use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;
use Spatie\SchemaOrg\Car;

class CartItemController extends Controller
{
    private $checkers = [
        MinimumSpend::class,
        MaximumSpend::class,
    ];

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(CheckProductIsInStock::class)->only(['store', 'update']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Modules\Cart\Http\Requests\StoreCartItemRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartItemRequest $request)
    {
        // dd($request->all());
        Cart::store($request->product_id, $request->qty, $request->options ?? []);
        return redirect()->route('cart.index');
        // return Cart::instance();
    }

    /**
     * @param StoreCartItemRequest $request
     * @return JsonResponse
     */
    public function ajaxStore(StoreCartItemRequest $request)
    {
        Cart::store($request->product_id, $request->qty, $request->options ?? []);
        return response()->json(true);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param mixed $cartItemId
     * @return \Illuminate\Http\Response
     */
    public function update($cartItemId)
    {
        // $qty = Cart::get($cartItemId);
        // if (request('qty') > $qty->qty) {
        //     Cart::updateQuantity($cartItemId, request('qty'));
        // }
        // // Cart::updateQuantity($cartItemId, request('qty'));
        // // Cart::updateService($cartItemId, request('service'));
        // try {
        //     resolve(Pipeline::class)
        //         ->send(Cart::coupon())
        //         ->through($this->checkers)
        //         ->thenReturn();
        // } catch (MinimumSpendException | MaximumSpendException $e) {
        //     Cart::removeCoupon();
        // }

        Cart::updateQuantity($cartItemId, request('qty'));

        try {
            resolve(Pipeline::class)
                ->send(Cart::coupon())
                ->through($this->checkers)
                ->thenReturn();
        } catch (MinimumSpendException | MaximumSpendException $e) {
            Cart::removeCoupon();
        }


        return [
            'item' => Cart::get($cartItemId),
            'items' => Cart::toArray()
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $cartItemId
     * @return \Illuminhtate\Http\Response
     */
    public function destroy($cartItemId)
    {
        // dd($cartItemId);
        Cart::remove($cartItemId);
        $message = [
            'message' => 'Remove cart success!',
            'type' => 'success',
        ];
        return back();
        // return response()->json($message);
    }
}
