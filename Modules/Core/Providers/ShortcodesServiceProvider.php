<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Shortcodes\InfoRegisterFormShortcode;
use Modules\Core\Shortcodes\SingleProductShortcode;
use Shortcode;
use Modules\Core\Shortcodes\BoxAlertShortcode;
use Modules\Core\Shortcodes\ToggleShortcode;
use Modules\Core\Shortcodes\ButtonShortcode;
use Modules\Core\Shortcodes\GoPricingShortcode;
use Modules\Core\Shortcodes\ContactFormShortcode;
use Modules\Core\Shortcodes\CaptionShortcode;
use Modules\Core\Shortcodes\ViewMoreShortcode;
use Modules\Core\Shortcodes\InternetFPTShortcode;
use Modules\Core\Shortcodes\PriceComboShortcode;
use Modules\Core\Shortcodes\ProductListShortcode;

class ShortcodesServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
         Shortcode::register('product_list', ProductListShortcode::class);
         Shortcode::register('single_product', SingleProductShortcode::class);
         Shortcode::register('info_register_form', InfoRegisterFormShortcode::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
