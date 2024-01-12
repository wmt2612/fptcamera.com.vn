<?php

use Carbon\Carbon;
use Modules\FlashSale\Entities\FlashSale;

if (! function_exists('product_price_formatted')) {
    /**
     * Get the selling price of the given product.
     *
     * @param \Modules\Product\Entities\Product $product
     * @param \Closure $callback
     * @return string
     */
    function product_price_formatted($product, $callback = null)
    {
        if (FlashSale::contains($product)) {
            $previousPrice = $product->getSellingPrice()->convertToCurrentCurrency()->format();
            $flashSalePrice = FlashSale::pivot($product)->price->convertToCurrentCurrency()->format();

            if (is_callable($callback)) {
                return $callback($flashSalePrice, $previousPrice);
            }

            return "{$flashSalePrice} <span class='previous-price'>{$previousPrice}</span>";
        }

        $price = $product->price->convertToCurrentCurrency()->format();
        $specialPrice = $product->getSpecialPrice()->convertToCurrentCurrency()->format();

        if (is_callable($callback)) {
            return $callback($price, $specialPrice);
        }

        if (! $product->hasSpecialPrice()) {
            return $price;
        }

        return "{$specialPrice} <span class='previous-price'>{$price}</span>";
    }
}

if (!function_exists('service_price_formatted')) {
    /**
     * Get the selling price of the given product.
     *
     * @param \Modules\Product\Entities\Product $product
     * @param \Closure $callback
     * @return string
     */
    function service_price_formatted($service, $callback = null)
    {
        $price = $service->price->convertToCurrentCurrency()->format();

        if (is_callable($callback)) {
            return $callback($price);
        }

        return $price;
    }
}

if (!function_exists('date_different_format')) {


    function date_different_format ($time) {
        Carbon::setLocale('vi'); 
        $now = Carbon::now();      
        return Carbon::parse($time)->diffForHumans($now);
    }

}

if (!function_exists('full_name')) {

    function full_name($first_name, $last_name) {

        return $first_name . ' ' . $last_name;

    }
    
}

