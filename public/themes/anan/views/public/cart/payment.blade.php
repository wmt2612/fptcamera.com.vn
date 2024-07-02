@extends('public.layout')

@section('title', 'Thanh toán')
@section('body_class', 'page-template-default page page-id-15 theme-vuhoangtelecom woocommerce-checkout woocommerce-page
woocommerce-no-js')
@push('styles')
    <link rel="stylesheet" href="{{ Theme::url('assets/css/cart.css') }}"/>
    <style>
        .coupon_wrapper {
            display: none;
            justify-content: space-between;
        }

        .coupon_wrapper.show {
            display: table-row !important;
            justify-content: space-between;
        }

        .coupon_name {
            font-size: 13px;
        }
    </style>
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
                                            <h1>Thanh toán</h1>
                                            <div>
                                                 <p>Trang thanh toán mua hàng trực tuyến FPTC JSC. Nơi bạn thanh
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
                                            <div class="woocommerce-notices-wrapper"></div>
                                            <div class="row">
                                                {{--                                            <div class="col-md-6">--}}
                                                {{--                                                <div class="woocommerce-form-login-toggle">--}}
                                                {{--                                                    <div class="woocommerce-info">--}}
                                                {{--                                                        Bạn đã có tài khoản? <a href="#" class="showlogin">Ấn vào đây để--}}
                                                {{--                                                            đăng--}}
                                                {{--                                                            nhập</a>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </div>--}}
                                                {{--                                                <form class="woocommerce-form woocommerce-form-login login"--}}
                                                {{--                                                    method="post" style="display:none;">--}}
                                                {{--                                                    <p>--}}
                                                {{--                                                      Nếu bạn đã có tài khoản, hãy đăng nhập vào form dưới đây để nhận những ưu đãi mới nhất. Nếu bạn là khách hàng mới, vui lòng chuyển sang phần Thanh toán & Vận chuyển.--}}
                                                {{--                                                    </p>--}}
                                                {{--                                                    <p class="form-row form-row-first">--}}
                                                {{--                                                        <label for="username">Tên đăng nhập hoặc email&nbsp;<span--}}
                                                {{--                                                                class="required">*</span></label>--}}
                                                {{--                                                        <input type="text" class="input-text" name="username"--}}
                                                {{--                                                            id="username" autocomplete="username" />--}}
                                                {{--                                                    </p>--}}
                                                {{--                                                    <p class="form-row form-row-last">--}}
                                                {{--                                                        <label for="password">Mật khẩu&nbsp;<span--}}
                                                {{--                                                                class="required">*</span></label>--}}
                                                {{--                                                        <input class="input-text" type="password" name="password"--}}
                                                {{--                                                            id="password" autocomplete="current-password" />--}}
                                                {{--                                                    </p>--}}
                                                {{--                                                    <div class="clear"></div>--}}
                                                {{--                                                    <p class="form-row">--}}
                                                {{--                                                        <label--}}
                                                {{--                                                            class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">--}}
                                                {{--                                                            <input--}}
                                                {{--                                                                class="woocommerce-form__input woocommerce-form__input-checkbox"--}}
                                                {{--                                                                name="rememberme" type="checkbox" id="rememberme"--}}
                                                {{--                                                                value="forever" />--}}
                                                {{--                                                            <span>Ghi nhớ mật khẩu</span>--}}
                                                {{--                                                        </label>--}}
                                                {{--                                                        <button type="submit"--}}
                                                {{--                                                            class="woocommerce-button button woocommerce-form-login__submit"--}}
                                                {{--                                                            name="login" value="Đăng nhập">Đăng nhập</button>--}}
                                                {{--                                                    </p>--}}
                                                {{--                                                    <p class="lost_password">--}}
                                                {{--                                                        <a href="#">Quên mật khẩu?</a>--}}
                                                {{--                                                    </p>--}}
                                                {{--                                                    <div class="clear"></div>--}}
                                                {{--                                                </form>--}}
                                                {{--                                            </div>--}}
                                                {{--                                            <div class="col-md-6">--}}
                                                {{--                                                <div class="woocommerce-form-coupon-toggle">--}}
                                                {{--                                                    <div class="woocommerce-info">--}}
                                                {{--                                                        Bạn có mã ưu đãi? <a href="#" class="showcoupon">Ấn vào đây để--}}
                                                {{--                                                            nhập mã</a>--}}
                                                {{--                                                    </div>--}}
                                                {{--                                                </div>--}}
                                                {{--                                                <form class="checkout_coupon woocommerce-form-coupon" method="post"--}}
                                                {{--                                                    style="display:none">--}}
                                                {{--                                                    <p>Nếu bạn có mã giảm giá, vui lòng điền vào phía bên dưới.</p>--}}
                                                {{--                                                    <p class="form-row form-row-first">--}}
                                                {{--                                                        <input type="text" name="coupon_code" class="input-text"--}}
                                                {{--                                                            placeholder="Nhập mã giảm giá" id="coupon_code" value="" />--}}
                                                {{--                                                    </p>--}}
                                                {{--                                                    <p class="form-row form-row-last">--}}
                                                {{--                                                        <button type="submit" class="button" name="apply_coupon" id="apply-coupon"--}}
                                                {{--                                                            value="Áp dụng">Áp--}}
                                                {{--                                                            dụng</button>--}}
                                                {{--                                                    </p>--}}
                                                {{--                                                    <div class="clear"></div>--}}
                                                {{--                                                </form>--}}
                                                {{--                                            </div>--}}
                                                <form action="{{ route('cart.postCheckout') }}" method="post">
                                                    @csrf
                                                    <div class="col2-set row az-billing mt-30 mb-30"
                                                         id="customer_details">
                                                        <div class="col-md-6">
                                                            <div class="woocommerce-billing-fields">
                                                                <h3>Thông tin thanh toán</h3>
                                                                <div class="woocommerce-billing-fields__field-wrapper">
                                                                    <p class="form-row form-row-wide validate-required"
                                                                       id="billing_last_name_field" data-priority="10">
                                                                        <label for="name" class="">Họ và
                                                                            tên&nbsp;<abbr class="required"
                                                                                           title="bắt buộc">*</abbr></label><span
                                                                                class="woocommerce-input-wrapper"><input
                                                                                    type="text" class="input-text "
                                                                                    name="name"
                                                                                    id="name"
                                                                                    placeholder="Họ tên của bạn"
                                                                                    value="{{ old('name') }}"/></span>
                                                                        @if ($errors->first('name'))
                                                                            <span class="help-block text-danger">{!! $errors->first('name') !!}</span>
                                                                        @endif
                                                                    </p>
                                                                    <p class="form-row form-row-first validate-required validate-phone"
                                                                       id="billing_phone_field" data-priority="20">
                                                                        <label
                                                                                for="phone" class="">Số điện
                                                                            thoại&nbsp;<abbr class="required"
                                                                                             title="bắt buộc">*</abbr></label><span
                                                                                class="woocommerce-input-wrapper"><input
                                                                                    type="tel" class="input-text "
                                                                                    name="phone" id="phone"
                                                                                    placeholder="Số điện thoại của bạn"
                                                                                    value="{{ old('phone') }}"/></span>
                                                                        @if ($errors->first('phone'))
                                                                            <span class="help-block text-danger">{!! $errors->first('phone') !!}</span>
                                                                        @endif
                                                                    </p>
                                                                    <p class="form-row form-row-last validate-required validate-email"
                                                                       id="billing_email_field" data-priority="21">
                                                                        <label
                                                                                for="email" class="">Địa chỉ
                                                                            email&nbsp;<abbr class="required"
                                                                                             title="bắt buộc">*</abbr></label><span
                                                                                class="woocommerce-input-wrapper"><input
                                                                                    type="email" class="input-text "
                                                                                    name="email" id="email"
                                                                                    placeholder="Email của bạn"
                                                                                    value="{{ old('email') }}"/></span>
                                                                        @if ($errors->first('email'))
                                                                            <span class="help-block text-danger">{!! $errors->first('email') !!}</span>
                                                                        @endif
                                                                    </p>
                                                                    <p class="form-row form-row-first address-field update_totals_on_change validate-required"
                                                                       id="billing_state_field" data-priority="30">
                                                                        <label for="province" class="">Tỉnh/Thành
                                                                            phố&nbsp;<abbr class="required"
                                                                                           title="bắt buộc">*</abbr></label>
                                                                        <span class="woocommerce-input-wrapper">
                                                                        <select name="province" id="province"
                                                                                class="select "
                                                                                value="{{ old('province') }}"
                                                                                data-placeholder="Chọn tỉnh/thành phố">
                                                                            <option value="">Chọn tỉnh/thành phố
                                                                            </option>
                                                                            @foreach ($provinces as $item)
                                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </span>
                                                                        @if ($errors->first('province'))
                                                                            <span class="help-block text-danger">{!! $errors->first('province') !!}</span>
                                                                        @endif
                                                                    </p>
                                                                    <p class="form-row form-row-last address-field update_totals_on_change validate-required validate-required"
                                                                       id="billing_city_field" data-priority="40">
                                                                        <label for="district" class="">Quận/Huyện <abbr
                                                                                    class="required"
                                                                                    title="bắt buộc">*</abbr></label>
                                                                        <select name="district" id="district"
                                                                                class="select "
                                                                                data-placeholder="Chọn quận huyện"
                                                                                value="{{ old('district') }}">
                                                                            <option value="" selected='selected'>Chọn
                                                                                quận
                                                                                huyện
                                                                            </option>
                                                                        </select>
                                                                        @if ($errors->first('district'))
                                                                            <span class="help-block text-danger">{!! $errors->first('district') !!}</span>
                                                                        @endif
                                                                    </p>
                                                                    <p class="form-row form-row-last validate-required"
                                                                       id="billing_address_1_field" data-priority="60">
                                                                        <label for="billing_address_1" class="">Địa
                                                                            chỉ&nbsp;<abbr class="required"
                                                                                           title="bắt buộc">*</abbr></label><span
                                                                                class="woocommerce-input-wrapper"><input
                                                                                    type="text" class="input-text "
                                                                                    name="address"
                                                                                    id="address"
                                                                                    placeholder="Ví dụ: Số 20, ngõ 90"
                                                                                    value="{{ old('address') }}"/></span>
                                                                        @if ($errors->first('address'))
                                                                            <span class="help-block text-danger">{!! $errors->first('address') !!}</span>
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="az-shipping mt-30">
                                                                <div class="woocommerce-additional-fields">
                                                                    <div
                                                                            class="woocommerce-additional-fields__field-wrapper">
                                                                        <p class="form-row notes"
                                                                           id="order_comments_field"
                                                                           data-priority=""><label for="note"
                                                                                                   class="">Ghi chú
                                                                                đơn hàng&nbsp;<span class="optional">(tuỳ
                                                                                chọn)</span></label><span
                                                                                    class="woocommerce-input-wrapper"><textarea
                                                                                        name="note"
                                                                                        class="input-text " id="note"
                                                                                        placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn."
                                                                                        rows="2" cols="5"
                                                                                        value="{{ old('note') }}"></textarea></span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <h3 id="order_review_heading">Đơn hàng của bạn</h3>
                                                            <div id="order_review"
                                                                 class="woocommerce-checkout-review-order">
                                                                <table
                                                                        class="shop_table woocommerce-checkout-review-order-table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="product-name">Sản phẩm</th>
                                                                        <th class="product-total">Tổng</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach ($cartItems->items() as $item)
                                                                        <tr class="cart_item">
                                                                            <td class="product-name">{{ $item->product->name }}
                                                                                <strong
                                                                                        class="product-quantity">&times;
                                                                                    {{ $item->qty }}</strong>
                                                                            </td>
                                                                            <td class="product-total">
                                                                            <span
                                                                                    class="woocommerce-Price-amount amount">{{ $item->product->selling_price->multiply($item->qty)->format() }}</span>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                    <tfoot>
                                                                    <tr class="cart-subtotal">
                                                                        <th>Tạm tính</th>
                                                                        <td><span
                                                                                    class="woocommerce-Price-amount amount">{{ $cartItems->subTotal()->format() }}</span>
                                                                        </td>
                                                                    </tr>
                                                                    @if ($cartItems->hasCoupon())
                                                                        <tr class="coupon_wrapper show">
                                                                            <th>Mã Giảm giá <br><span
                                                                                        class="coupon_name">({{ $cartItems->coupon()->code() }})</span>
                                                                            </th>
                                                                            <td class="coupon_value">{{ $cartItems->coupon()->value()->format() }}</td>
                                                                        </tr>
                                                                    @else
                                                                        <tr class="coupon_wrapper">
                                                                            <th>Mã Giảm giá <br><span
                                                                                        class="coupon_name"></span></th>
                                                                            <td class="coupon_value"></td>
                                                                        </tr>
                                                                    @endif
                                                                    <tr class="order-total">
                                                                        <th>Tổng cộng</th>
                                                                        <td><strong><span
                                                                                        class="woocommerce-Price-amount amount total">{{ $cartItems->total()->format() }}</span></strong>
                                                                        </td>
                                                                    </tr>
                                                                    </tfoot>
                                                                </table>
                                                                <div style="margin-bottom: 1rem; padding: 0 1rem">
                                                                    <form class="checkout_coupon woocommerce-form-coupon"
                                                                          method="post"
                                                                          style="display:none">

                                                                        <p>Nếu bạn có mã giảm giá, vui lòng điền vào
                                                                            phía bên dưới.</p>
                                                                        <div class="row">
                                                                            <div class="col-8 p-r-0">
                                                                                <input type="text" name="coupon_code"
                                                                                       class="input-text"
                                                                                       style="width: 100%;height: 100%"
                                                                                       placeholder="Nhập mã giảm giá"
                                                                                       id="coupon_code" value=""/>
                                                                            </div>
                                                                            <div class="col-4 ">
                                                                                <button type="submit" class="button"
                                                                                        name="apply_coupon"
                                                                                        id="apply-coupon"
                                                                                        value="Áp dụng">Áp
                                                                                    dụng
                                                                                </button>
                                                                            </div>
                                                                        </div>

                                                                        <div class="clear"></div>
                                                                    </form>
                                                                </div>
                                                                <div id="payment" class="woocommerce-checkout-payment">
                                                                    <ul class="wc_payment_methods payment_methods methods">
                                                                        @foreach ($gateways as $key => $gateway)
                                                                            <li class="wc_payment_method payment_method_{{ $key }}">
                                                                                <input id="payment_method_{{ $key }}"
                                                                                       type="radio"
                                                                                       class="input-radio"
                                                                                       name="payment_method"
                                                                                       value="{{ $key }}"
                                                                                       checked='checked'
                                                                                       data-order_button_text=""/><label
                                                                                        for="payment_method_{{ $key }}">
                                                                                    {{ $gateway->label }} </label>
                                                                                @if ($key != 'cod' && $gateway->instructions)
                                                                                    <div class="payment_box payment_method_{{ $key }}">
                                                                                        {!! $gateway->instructions !!}
                                                                                    </div>
                                                                                @else
                                                                                    <div class="payment_box payment_method_{{ $key }}">
                                                                                        <p>{{ $gateway->description }}</p>
                                                                                    </div>
                                                                                @endif
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                    <div class="form-row place-order">
                                                                        <noscript>
                                                                            Trình duyệt của bạn không hỗ trợ JavaScript,
                                                                            hoặc nó bị vô hiệu
                                                                            hóa, hãy đảm bảo bạn nhấp vào <em>Cập nhật
                                                                                giỏ
                                                                                hàng</em> trước
                                                                            khi bạn thanh toán. Bạn có thể phải trả
                                                                            nhiều
                                                                            hơn số tiền đã
                                                                            nói ở trên, nếu bạn không làm như vậy.
                                                                            <br/>
                                                                            <button type="submit" class="button alt"
                                                                                    name="woocommerce_checkout_update_totals"
                                                                                    value="Cập nhật tổng">Cập nhật tổng
                                                                            </button>
                                                                        </noscript>
                                                                        <div
                                                                                class="woocommerce-terms-and-conditions-wrapper">
                                                                            <div class="woocommerce-privacy-policy-text">
                                                                                <p>Thông tin cá nhân của bạn sẽ được sử
                                                                                    dụng
                                                                                    để xử lý đơn
                                                                                    hàng, tăng trải nghiệm sử dụng
                                                                                    website,
                                                                                    và cho các mục
                                                                                    đích cụ thể khác đã được mô tả trong
                                                                                    <a
                                                                                            href="/chinh-sach-bao-mat-thong-tin-khach-hang/"
                                                                                            rel="noopener"
                                                                                            target="_blank">Chính
                                                                                        sách riêng
                                                                                        tư</a>.</p>
                                                                            </div>
                                                                        </div>
                                                                        <button type="submit" class="button alt"
                                                                                name="woocommerce_checkout_place_order"
                                                                                id="place_order" value="Đặt hàng"
                                                                                data-value="Đặt hàng">Đặt hàng
                                                                        </button>
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
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#payment_method_cod').click();
            $('#apply-coupon').click(function (e) {
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
                    success: function (response) {
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
                    error: function (error) {
                        $('.alert_coupon_message').text(error.responseJSON.message);
                        $('.alert_coupon_message').fadeIn();
                        setTimeout(() => {
                            $('.alert_coupon_message').fadeOut();
                        }, 3000);
                    }
                });
            });
            $('#province, #district').select2();
            $('#province').on('change', function () {
                setTimeout(() => {
                    $('.blockUI').remove();
                }, 500);
                const id = $(this).val();
                const url = route('cart.getDistrict', {id: id});
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (data) {
                        let html = '';
                        $.each(data, function (index, value) {
                            html += `<option value="${value.id}">${value.name}</option>`;
                        });
                        $('#district').empty();
                        $('#district').append(html);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
            $('#district').on('change', function () {
                setTimeout(() => {
                    $('.blockUI').remove();
                }, 500);
            });
            setTimeout(() => {
                $('.blockUI').remove();
            }, 500);
        });
    </script>
@endpush
