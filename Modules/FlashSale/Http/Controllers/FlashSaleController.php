<?php

namespace Modules\FlashSale\Http\Controllers;

use Illuminate\Routing\Controller;

class FlashSaleController extends Controller {

    public function index() {
        return view('public.flashsale.index');
    }

}