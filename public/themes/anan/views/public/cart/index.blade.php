@extends('public.layout')

@section('title', 'Giỏ hàng')
@section('body_class', 'page-template-default page page-id-14 theme-vuhoangtelecom woocommerce-cart woocommerce-page woocommerce-no-js')

@push('styles')
<link rel="stylesheet" href="{{ Theme::url('assets/css/cart.css') }}" />
<style>
    .coupon_wrapper{
        display: none;
        justify-content: space-between;
    }
    .coupon_wrapper.show{
        display: table-row !important;
        justify-content: space-between;
    }
    .coupon_name{
        font-size: 13px;
    }
</style>
@endpush

@section('content')
<div class="az-wp bg_content_info_woo">
    @if ($cartItems->items()->isEmpty())
    <style>
        .mt-100 {
            margin-top: 100px
        }

        .card {
            margin-bottom: 30px;
            border: 0;
            -webkit-transition: all .3s ease;
            transition: all .3s ease;
            letter-spacing: .5px;
            border-radius: 8px;
            -webkit-box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, .05);
            box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, .05)
        }

        .card .card-header {
            background-color: #fff;
            border-bottom: none;
            padding: 24px;
            border-bottom: 1px solid #f6f7fb;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px
        }

        .card-header:first-child {
            border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
        }

        .card .card-body {
            padding: 30px;
            background-color: transparent
        }

        .btn-primary,
        .btn-primary.disabled,
        .btn-primary:disabled {
            background-color: #4466f2 !important;
            border-color: #4466f2 !important
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <div class="card-body cart">
                        <div class="col-sm-12 empty-cart-cls text-center"> <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                            <h3><strong>Your Cart is Empty</strong></h3>
                            <h4>Add something to make me happy :)</h4> <a href="{{ route('home') }}" class="btn btn-primary cart-btn-transform m-3" data-abc="true">continue shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
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
                                            <h1>Giỏ hàng của bạn</h1>
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
                                        <form class="woocommerce-cart-form" action="{{ route('cart.update') }}" method="post">
                                            @csrf
                                            <div class="row az-cart pt-30">
                                                <div class="col-md-9">
                                                    <table
                                                        class="shop_table shop_table_responsive cart woocommerce-cart-form__contents"
                                                        cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th class="product-remove">&nbsp;</th>
                                                                <th class="product-thumbnail">&nbsp;</th>
                                                                <th class="product-name">Sản phẩm</th>
                                                                <th class="product-price">Giá</th>
                                                                <th class="product-quantity">Số lượng</th>
                                                                <th class="product-subtotal">Tổng</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($cartItems->items() as $cart)
                                                            <tr class="woocommerce-cart-form__cart-item cart_item">
                                                                <td class="product-remove">
                                                                    <a href="#" class="remove btn-remove-item" data-cartid="{{ $cart }}">&times;</a>
                                                                </td>
                                                                <td class="product-thumbnail">
                                                                    <a href="{{ route('product.single', ['slug' => $cart->product->slug]) }}">
                                                                        <img width="300" height="300"
                                                                            src="{{ $cart->product->base_image->path }}"
                                                                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                                            alt="{{ $cart->product->name }}"
                                                                            loading="lazy" />
                                                                    </a>
                                                                </td>
                                                                <td class="product-name" data-title="Sản phẩm">
                                                                    <a href="{{ route('product.single', ['slug' => $cart->product->slug]) }}">
                                                                        {{ $cart->product->name }}
                                                                    </a>
                                                                </td>
                                                                <td class="product-price" data-title="Giá">
                                                                    <span class="woocommerce-Price-amount amount">{{ $cart->product->selling_price->format() }}</span>
                                                                </td>
                                                                <td class="product-quantity" data-title="Số lượng">
                                                                    <div class="quantity">
                                                                        <input type="number"
                                                                            class="input-text qty text" step="1" min="0"
                                                                            name="cart[{{ $cart->id }}]"
                                                                            value="{{ $cart->qty }}" title="SL" size="4" placeholder=""
                                                                            inputmode="numeric" />
                                                                    </div>
                                                                </td>
                                                                <td class="product-subtotal" data-title="Tổng">
                                                                    <span class="woocommerce-Price-amount amount">{{ $cart->product->selling_price->multiply($cart->qty)->format() }}</span>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            <tr>
                                                                <td colspan="6" class="actions">
                                                                    <button type="button" class="button btn-redirecthome">Tiếp
                                                                        tục mua hàng</button>
                                                                    <button type="submit" class="button"
                                                                        name="update_cart" value="Cập nhật giỏ hàng">Cập
                                                                        nhật giỏ hàng</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="cart-collaterals">
                                                        <div class="cart_totals ">
                                                            <h2>Cộng giỏ hàng</h2>
                                                            <table cellspacing="0"
                                                                class="shop_table shop_table_responsive">
                                                                <tr class="cart-subtotal">
                                                                    <th>Tạm tính</th>
                                                                    <td data-title="Tạm tính"><span
                                                                            class="woocommerce-Price-amount amount">{{ $cartItems->subTotal()->format() }}</span>
                                                                    </td>
                                                                </tr>
                                                                @if ($cartItems->hasCoupon())
                                                                <tr class="coupon_wrapper show">
                                                                    <th>Mã Giảm giá <br><span class="coupon_name">({{ $cartItems->coupon()->code() }})</span></th>
                                                                    <td class="coupon_value">{{ $cartItems->coupon()->value()->format() }}</td>
                                                                </tr>
                                                                @else
                                                                <tr class="coupon_wrapper">
                                                                    <th>Mã Giảm giá <br><span class="coupon_name"></span></th>
                                                                    <td class="coupon_value"></td>
                                                                </tr>
                                                                @endif
                                                                <tr class="order-total">
                                                                    <th>Tổng</th>
                                                                    <td data-title="Tổng"><strong><span
                                                                                class="woocommerce-Price-amount amount total">{{ $cartItems->total()->format() }}</span></strong>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <div class="wc-proceed-to-checkout">
                                                                <a href="{{ route('cart.payment') }}"
                                                                    class="checkout-button button alt wc-forward">
                                                                    Tiến hành thanh toán</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="az-coupon">
                                                        <div class="coupon">
                                                            <p class="text-coupon">Bạn có mã giảm giá ?</p>
                                                            <p class="alert_coupon_message"></p>
                                                            <div class="az-form-coupon">
                                                                <input type="text" name="coupon_code" class="input-text"
                                                                    id="coupon_code" value=""
                                                                    placeholder="Nhập mã giảm giá" />
                                                                <button type="submit" class="button" name="apply_coupon" id="apply-coupon"
                                                                    value="Áp dụng">Áp dụng</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </main>
            </section>
        </div>
    </div>
    @endif
</div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $('.btn-redirecthome').click(function(){
                window.location.href = route('home');
            });
            $('#apply-coupon').click(function(e){
                e.preventDefault();
                const url = route('cart.coupon.store');
                const coupon = $('#coupon_code').val();

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        coupon,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response){
                        $('.alert_coupon_message').text('Áp dụng mã giảm giá thành công!');
                        $('.alert_coupon_message').fadeIn();
                        setTimeout(() => {
                            $('.alert_coupon_message').fadeOut();
                        }, 3000);
                        $('.coupon_wrapper').css('display', 'table-row');
                        $('.coupon_name').text(`(${response.coupon.code})`);
                        $('.coupon_value').text(`${response.coupon.value.formatted}`);
                        $('.total').text(response.total.formatted);
                        $('#coupon_code').val('');
                    },
                    error: function(error){
                        $('.alert_coupon_message').text(error.responseJSON.message);
                        $('.alert_coupon_message').fadeIn();
                        setTimeout(() => {
                            $('.alert_coupon_message').fadeOut();
                        }, 3000);
                    }
                });
            });
            $('.btn-remove-item').click(function(e){
                e.preventDefault();
                const id = $(this).data('id');
                const url = route('cart.items.destroy', {cartItemId: id});
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "_method": 'DELETE'
                    },
                    success: function(response){
                        window.location.reload();
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
