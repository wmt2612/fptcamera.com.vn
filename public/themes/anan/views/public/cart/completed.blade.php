@extends('public.layout')

@section('title', 'Cảm ơn')
@section('body_class', 'page-template-default page page-id-15 logged-in theme-vuhoangtelecom woocommerce-checkout
woocommerce-page woocommerce-order-received woocommerce-no-js')

@push('styles')
<link rel="stylesheet" href="{{ Theme::url('assets/css/cart.css') }}" />
@endpush

@section('content')
<div class="az-wp bg_content_info_woo">
    <div class="container">
        <div class="row-fluid-wrapper row-depth-1 row-number-2">
            <div class="row-fluid ">
                <div class="span12 widget-span widget-type-global_widget">
                    <div class="cell-wrapper layout-widget-wrapper">
                        <span id="hs_cos_wrapper_legal_page_banner"
                            class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_raw_html">
                            <section class="hsg-page-header">
                                <div class="hsg-page-header__content" data-background-overlay="gradient5">
                                    <div class="hsg-page-header__container hsg-page-width-normal">
                                        <div class="hsg-page-header__text">
                                            <h1>Đơn hàng đã nhận</h1>
                                            <div>
                                                <p>Trang thanh toán mua hàng trực tuyến FPTC JSC Nơi bạn thanh
                                                    toán đơn
                                                    hàng Online nhanh chóng và tiện lợi</p>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="hsg-page-width-normal">
            <section class="blog-post-content">
                <main class="post-body">
                    <main class="post-body__content">
                        <div class="post-content">
                            <div class="post-content__sticky-social"></div>
                            <div class="hsg-rich-text">
                                <div class="hsg-rich-text__wrapper post-content__wrapper blog-postPage-content">
                                    <div class="woocommerce">
                                        <div class="woocommerce-order">
                                            <p
                                                class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">
                                                Cảm ơn bạn. Đơn hàng của bạn đã được nhận.</p>
                                            <p class="text-center" style="margin-bottom: 5px;">Để tiết kiệm thời gian
                                                mua hàng,
                                                Quý khách vui lòng liên hệ trực tiếp qua số điện thoại:</p>
                                            <ul style="margin: 0 auto;display: table;margin-bottom: 20px;">
                                                @php
                                                    $hotlines = explode(',', setting('support_hotline')) ?? [];
                                                @endphp
                                                @foreach ($hotlines as $hotline)
                                                <li>{{ $hotline }}</li>
                                                @endforeach
                                            </ul>
                                            <ul
                                                class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
                                                <li class="woocommerce-order-overview__order order">
                                                    Mã đơn hàng: <strong>#{{ $order->id }}</strong>
                                                </li>
                                                <li class="woocommerce-order-overview__date date">
                                                    Ngày: <strong>{{ $order->created_at->format('d/m/Y') }}</strong>
                                                </li>
                                                <li class="woocommerce-order-overview__email email">
                                                    Email: <strong>{{ $order->customer_email }}</strong>
                                                </li>
                                                <li class="woocommerce-order-overview__total total">
                                                    Tổng cộng: <strong><span
                                                            class="woocommerce-Price-amount amount">{{ $order->total->format() }}</span></strong>
                                                </li>
                                                <li class="woocommerce-order-overview__payment-method method">
                                                    Phương thức thanh toán: <strong>{{ $order->payment_method }}</strong>
                                                </li>
                                            </ul>
                                            <section class="woocommerce-order-details">
                                                <h2 class="woocommerce-order-details__title">Chi tiết đơn hàng</h2>
                                                <table
                                                    class="woocommerce-table woocommerce-table--order-details shop_table order_details">
                                                    <thead>
                                                        <tr>
                                                            <th class="woocommerce-table__product-name product-name">Sản
                                                                phẩm</th>
                                                            <th class="woocommerce-table__product-table product-total">
                                                                Tổng</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($order->products as $item)
                                                        <tr class="woocommerce-table__line-item order_item">
                                                            <td class="woocommerce-table__product-name product-name">
                                                                <a
                                                                    href="{{ route('product.single', ['slug' => $item->product->slug]) }}">{{ $item->product->name }}</a> <strong
                                                                    class="product-quantity">&times;&nbsp;{{ $item->qty }}</strong>
                                                            </td>
                                                            <td class="woocommerce-table__product-total product-total">
                                                                <span class="woocommerce-Price-amount amount">{{ $item->line_total->format() }}</span>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th scope="row">Tổng số phụ:</th>
                                                            <td><span
                                                                    class="woocommerce-Price-amount amount">{{ $order->sub_total->format() }}</span>
                                                            </td>
                                                        </tr>
                                                        @if ($order->discount->amount() > 0)
                                                        <tr>
                                                            <th>Giảm giá</th>
                                                            <td>{{ $order->discount->format() }}</td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <th scope="row">Phương thức thanh toán:</th>
                                                            <td>{{ $order->payment_method }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Tổng cộng:</th>
                                                            <td><span
                                                                    class="woocommerce-Price-amount amount">{{ $order->total->format() }}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>Lưu ý:</th>
                                                            <td>{{ $order->note }}</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </main>
            </section>
        </div>
    </div>
</div>
@endsection