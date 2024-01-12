@extends('public.layout')
@section('title', $product->meta->meta_title ?: $product->name)
@section('body_class', 'product-template-default single single-product postid-70455 theme-vuhoangtelecom woocommerce
woocommerce-page woocommerce-no-js')

@push('mid-styles')
<link rel="stylesheet" href="{{ Theme::url('assets/css/woocommercea.css') }}">
@endpush
@push('styles')
<style type="text/css">
    img.wp-smiley,
    img.emoji {
        display: inline !important;
        border: none !important;
        box-shadow: none !important;
        height: 1em !important;
        width: 1em !important;
        margin: 0 .07em !important;
        vertical-align: -0.1em !important;
        background: none !important;
        padding: 0 !important;
    }

    .rating {
        display: inline-block;
        position: relative;
        height: 20px;
        line-height: 20px;
        font-size: 20px;
    }

    .rating label {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        cursor: pointer;
    }

    .rating label:last-child {
        position: static;
    }

    .rating label:nth-child(1) {
        z-index: 5;
    }

    .rating label:nth-child(2) {
        z-index: 4;
    }

    .rating label:nth-child(3) {
        z-index: 3;
    }

    .rating label:nth-child(4) {
        z-index: 2;
    }

    .rating label:nth-child(5) {
        z-index: 1;
    }

    .rating label input {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
    }

    .rating label .icon {
        float: left;
        color: transparent;
    }

    .rating label:last-child .icon {
        color: #000;
    }

    .rating:not(:hover) label input:checked~.icon,
    .rating:hover label:hover input~.icon {
        color: #FDB82E;
    }

    .rating label input:focus:not(:checked)~.icon:last-child {
        color: #000;
        text-shadow: 0 0 5px #FDB82E;
    }

    .flex-control-thumbs li {
        height: 105px;
        overflow: hidden;
        margin: 7px;
    }

    #description-product {
        overflow-y: auto;
    }
</style>
@endpush
@section('content')
<div class="az-breadcrumb-woo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="woocommerce-breadcrumb" itemprop="breadcrumb">
                    <a href="{{ route('home') }}">Trang chủ</a><span> » </span>
                    <a href="{{ route('product.index') }}">Sản phẩm</a><span> » </span>
                    {!! $breadcrumb !!}
                    {{ $product->name }}
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="az-wp">
    <div class="container">
        <div id="primary" class="content-area">

            <main id="main" class="site-main" role="main">
                <div class="woocommerce-notices-wrapper"></div>
                <div class="row row-single-product">
                    <div class="col-xl-9 description-product">
                        <div id="product-70455" class="row">
                            <div class="col-md-6 az-single-product-gallery-images">
                              <div id="product-gallery-wrapbox" style="top: 55px;">
                                @if ($product->hasSpecialPrice())
                                <span class="onsale">-{{ $product->price_percent_convert }}%</span>
                                @endif
                                <div id="images-product" class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images"
                                    data-columns="4" style="opacity: 0; transition: opacity .25s ease-in-out;">
                                    <figure class="woocommerce-product-gallery__wrapper">
                                        <div data-thumb="{{ $product->base_image->path }}"
                                            data-thumb-alt="Camera Wifi 4MP IPC-A42P-B-iMOU"
                                            class="woocommerce-product-gallery__image">
                                            <a href="{{ $product->base_image->path }}">
                                                <img width="600" height="600" src="{{ $product->base_image->path }}"
                                                    class="wp-post-image" alt="{{ $product->name }}" loading="lazy"
                                                    title="camera-wifi-4mp-ipc-a42p-b-imou-1" data-caption=""
                                                    data-src="{{ $product->base_image->path }}"
                                                    data-large_image="{{ $product->base_image->path }}"
                                                    data-large_image_width="700" data-large_image_height="700"
                                                    sizes="(max-width: 600px) 100vw, 600px" />
                                            </a>
                                        </div>
                                        @foreach ($product->additional_images as $image)
                                        <div data-thumb="{{ $image->path }}" data-thumb-alt="{{ $product->name }}"
                                            class="woocommerce-product-gallery__image">
                                            <div>
                                                <a href="{{ $image->path }}">
                                                    <img width="600" height="600" src="{{ $image->path }}" class=""
                                                        alt="{{ $product->name }}" loading="lazy"
                                                        title="camera-wifi-4mp-ipc-a42p-b-imou-2" data-caption=""
                                                        data-src="{{ $image->path }}"
                                                        data-large_image="{{ $image->path }}"
                                                        data-large_image_width="700" data-large_image_height="700"
                                                        sizes="(max-width: 600px) 100vw, 600px" />
                                                </a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </figure>
                                </div>
                              </div>
                            </div>
                            <div id="description-product" class="col-md-6 az-single-product-short-description">
                                <div class="summary entry-summary">
                                    <h1 class="product_title entry-title">{{ $product->name }}</h1>
                                    @if ($product->sku)
                                    <p class='info-attribute-product'>Mã SP: <span>{{ $product->sku }}</span></p>
                                    @endif
                                    @if ($product->brand->id > 0)
                                    <p class='info-attribute-product'>Hãng SX: <a
                                            href="{{ route('product.brand', ['slug' => $product->brand->slug]) }}">
                                            <span>{{ $product->brand->name }}</span></a></p>
                                    @endif
                                    @include('public.product.partials.same_version_products')
                                    <div class='az-price pb-15 mb-15'>
                                        {{-- @dd($product->selling_price->format() ) --}}
                                        @if ($product->contact_for_price)
                                        <p class='price'>
                                           Giá liên hệ
                                        </p>
                                        @else
                                            <p class='price'>
                                                {{ $product->selling_price->format() }}
                                                <span> ({{ $product->vat_notice ?? 'Giá đã bao gồm VAT' }})</span>
                                            </p>
                                            @if ($product->hasSpecialPrice())
                                            <ul class='info-price'>
                                                <li>Tiết kiệm: <span class='percent_number'>{{
                                                        $product->price_percent_convert }}%</span>
                                                </li>
                                                <li>Giá chính hãng: {{ $product->price->format() }}</li>
                                            </ul>
                                            @endif
                                        @endif


                                    </div>
                                    <div class="woocommerce-product-details__short-description">
                                        {!! $product->short_description !!}
                                    </div>
                                    <form id="form-cart" class="cart" action="{{ route('cart.items.store') }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}"
                                            id="product_id">
                                        <span class='sub-cart-form text-quality'>Số lượng: </span>
                                        <div class="quantity">
                                            <input type="number" id="quantity_60fe750c7343c" class="input-text qty text"
                                                step="1" min="1" name="qty" value="1" />
                                        </div>
                                        <span class='sub-cart-form stock-status'>Tình trạng: <span
                                                class='value-status'>Còn
                                                hàng</span></span>
                                        <div class='az-btn-single-product'>
                                            <button type="submit" name="add-to-cart"
                                                class="single_add_to_cart_button btn_buy button alt">CHỌN MUA</button>
                                            <a class="single_add_to_cart_button button alt second_button_add_to_cart"
                                                data-toggle="modal" data-target="#myModal-tuvan" href="#">TƯ VẤN MUA
                                                HÀNG</a>
                                        </div>
                                    </form>
                                    <h5 class='text-meta'>* Đặt Mua Online - <strong>Giao Hàng COD kiểm hàng & thanh
                                            toán tận
                                            nơi</strong></h5>
                                    @if (setting('anan_product_promotion_widget'))
                                    <div class="footer-block">
                                        <div class="item-promotion" id="promotion">
                                            {!! setting('anan_product_promotion_widget') !!}
                                        </div>
                                    </div>
                                    @endif
                                    <!-- AddToAny BEGIN -->
                                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                        <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                        <a class="a2a_button_facebook"></a>
                                        <a class="a2a_button_twitter"></a>
                                        <a class="a2a_button_pinterest"></a>
                                        <a class="a2a_button_linkedin"></a>
                                        <a class="a2a_button_email"></a>
                                    </div>
                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                    <!-- AddToAny END -->
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="title-tabs mb-30 mt-30">
                                    <h2 class="mb-20">Mô tả sản phẩm</h2>
                                    <div class="content-tabs tabs-mota loadmore">
                                        {!! $product->description !!}
                                    </div>
                                    <div class="az-btn-load-more text-center">
                                        <a href="#" class="btn-load-more">Xem thêm</a>
                                    </div>
                                </div>
                                <div class="title-tabs mb-30">
                                    <h2 class="mb-20">Thông số kỹ thuật</h2>
                                    <div class="content-tabs">
                                        {!! $product->specifications !!}
                                    </div>
                                </div>
                                <div class="title-tabs mb-30">
                                    <h2 class="mb-20">Thông tin hãng sản xuất</h2>
                                    <div class="content-tabs">
                                        {!! $product->brand->description !!}
                                    </div>
                                </div>
                                <div class="title-tabs mb-30">
                                    <h2 class="mb-20">Sản phẩm mua kèm</h2>
                                    <div class="content-tabs">
                                        <div class="owl-carousel owl-theme az_ntl_list_product_owl">
                                            @foreach ($product->crossSellProducts as $item)
                                            @include('public.product.partials.item')
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="title-tabs mb-30">
                                    <h2 class="mb-20">Sản phẩm liên quan</h2>
                                    <div class="content-tabs">
                                        <div class="owl-carousel owl-theme az_ntl_list_product_owl">
                                            @foreach ($relatedProducts as $item)
                                            @include('public.product.partials.item')
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="title-tabs mb-30">
                                    <h2 class="mb-20">Sản phẩm bạn đã xem</h2>
                                    <div class="content-tabs">
                                        <div class="owl-carousel owl-theme owl-related-product">
                                            @foreach ($productsRecentlyViewed as $item)
                                            @include('public.product.partials.item')
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="title-tabs mb-20 az-mt-100">
                                    <h2 class="mb-30">Đánh giá về sản phẩm</h2>
                                    <div class="content-tabs">
                                        <div id="reviews" class="woocommerce-Reviews">
                                            <div id="comments">
                                                <ol class="commentlist">
                                                    @foreach ($product->reviews as $review)
                                                    <li class="review even thread-even depth-1" id="li-comment-16441">
                                                        <div id="comment-16441" class="comment_container">
                                                            <img alt='' src='{{ gravatarUrl($review->reviewer_email) }}'
                                                                class='avatar avatar-60 photo' height='60' width='60'
                                                                loading='lazy' />
                                                            <div class="comment-text">
                                                                <div class="star-rating" role="img"
                                                                    aria-label="Được xếp hạng 5 5 sao">
                                                                    <span
                                                                        style="width:{{$review->rating_percent}}%">Được
                                                                        xếp hạng <strong class="rating">{{
                                                                            $review->rating }}</strong> {{
                                                                        $review->rating }} sao</span>
                                                                </div>
                                                                <p class="meta">
                                                                    <strong class="woocommerce-review__author">{{
                                                                        $review->reviewer_name }}
                                                                    </strong>
                                                                    <span
                                                                        class="woocommerce-review__dash">&ndash;</span>
                                                                    <time class="woocommerce-review__published-date"
                                                                        datetime="{{ $review->date }}">{{
                                                                        $review->date}}</time>
                                                                </p>
                                                                <div class="description">
                                                                    <p>{{ $review->comment }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @if ($review->children)
                                                        <ul class="children">
                                                            <li class="comment byuser comment-author-cskh odd alt depth-2"
                                                                id="li-comment-16465">
                                                                <div id="comment-16465" class="comment_container">
                                                                    <img alt=''
                                                                        src='{{ gravatarUrl($review->children->email) }}'
                                                                        class='avatar avatar-60 photo' height='60'
                                                                        width='60' loading='lazy' />
                                                                    <div class="comment-text">
                                                                        <p class="meta">
                                                                            <strong
                                                                                class="woocommerce-review__author">{{
                                                                                $review->children->reviewer->full_name
                                                                                }}
                                                                            </strong>
                                                                            <span
                                                                                class="woocommerce-review__dash">&ndash;</span>
                                                                            <time
                                                                                class="woocommerce-review__published-date"
                                                                                datetime="{{ $review->children->date }}">{{
                                                                                $review->children->date }}</time>
                                                                        </p>
                                                                        <div class="description">
                                                                            <p>{{ $review->children->comment }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <!-- #comment-## -->
                                                        </ul>
                                                        @endif
                                                        <!-- .children -->
                                                    </li>
                                                    @endforeach
                                                </ol>
                                            </div>
                                            <div id="review_form_wrapper">
                                                <div id="review_form">
                                                    <div id="respond" class="comment-respond">
                                                        <span id="reply-title" class="comment-reply-title">Chia sẻ nhận
                                                            xét của bạn
                                                            về {{ $product->name }} <small><a rel="nofollow"
                                                                    id="cancel-comment-reply-link"
                                                                    href="index.html#respond"
                                                                    style="display:none;">Hủy</a></small></span>
                                                        <form action="{{ route('product.postComment') }}" method="post"
                                                            id="commentform" class="comment-form">
                                                            @csrf
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product->id }}">
                                                            <input type="hidden" name="parent_id">
                                                            <p class="comment-notes"><span id="email-notes">Email của
                                                                    bạn sẽ không được hiển thị công khai.</span></p>
                                                            <p class="comment-form-comment">
                                                                <textarea id="comment" name="comment" cols="100"
                                                                    rows="4"
                                                                    placeholder="Nhập câu hỏi / bình luận / nhận xét tại đây..."
                                                                    required>
                                                                </textarea>
                                                            </p>
                                                            <div class="comment-form-rating">
                                                                <div class="rating-box" style="display: flex;">
                                                                    <label class="lb-rating" for="rating">Đánh giá của
                                                                        bạn</label>
                                                                    <div class="rating">
                                                                        <label>
                                                                            <input type="radio" name="rating"
                                                                                value="1" />
                                                                            <span class="icon">★</span>
                                                                        </label>
                                                                        <label>
                                                                            <input type="radio" name="rating"
                                                                                value="2" />
                                                                            <span class="icon">★</span>
                                                                            <span class="icon">★</span>
                                                                        </label>
                                                                        <label>
                                                                            <input type="radio" name="rating"
                                                                                value="3" />
                                                                            <span class="icon">★</span>
                                                                            <span class="icon">★</span>
                                                                            <span class="icon">★</span>
                                                                        </label>
                                                                        <label>
                                                                            <input type="radio" name="rating"
                                                                                value="4" />
                                                                            <span class="icon">★</span>
                                                                            <span class="icon">★</span>
                                                                            <span class="icon">★</span>
                                                                            <span class="icon">★</span>
                                                                        </label>
                                                                        <label>
                                                                            <input type="radio" name="rating"
                                                                                value="5" />
                                                                            <span class="icon">★</span>
                                                                            <span class="icon">★</span>
                                                                            <span class="icon">★</span>
                                                                            <span class="icon">★</span>
                                                                            <span class="icon">★</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <p>Bạn đang băn khoăn cần tư vấn? Vui lòng để lại số
                                                                    điện thoại hoặc
                                                                    lời nhắn, nhân viên FPTC JSC sẽ liên hệ trả
                                                                    lời bạn sớm
                                                                    nhất.</p>
                                                                <p class="comment-form-author"><label
                                                                        for="name">Tên&nbsp;<span
                                                                            class="required">*</span></label> <input
                                                                        id="name" name="name" type="text" value=""
                                                                        size="30" required /></p>
                                                                <p class="comment-form-email"><label
                                                                        for="email">Email&nbsp;</label>
                                                                    <input id="email" name="email" type="email" value=""
                                                                        size="30" />
                                                                </p>
                                                                <p class="form-submit"><input type="submit" id="submit"
                                                                        class="submit" value="Gửi đánh giá" />
                                                                </p>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- #respond -->
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('public.product.sidebar')
                </div>
            </main>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-buy-sidebar').click(function(e){
            e.preventDefault();
            $('.single_add_to_cart_button.btn_buy').click();
        });

        const productGalleryWrapboxHeight = $('#images-product').outerHeight(true);

        $('#product-gallery-wrapbox').height(productGalleryWrapboxHeight);;

 

        // $('.btn-buynow-mobile').click(function() {
        //     const url = route('cart.items.store');
        //     const productId = $('#product_id').val();
        //     const quantity = $('#quantity_60fe750c7343c').val();
        //     $.ajax({
        //         type: "POST",
        //         url: url,
        //         data: {
        //             product_id: productId,
        //             qty: quantity,
        //         },
        //         success: function () {
        //             const redirect = window.location.origin + '/cart';
        //             window.location.replace(redirect);
        //         }
        //     });
        // })
        
    });

    function setScrollDescriptionProduct() {
        let descriptionProductHeight = $('#description-product').height();
        let imagesProductHeight = $('#images-product').height();
        let width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

        if (descriptionProductHeight > imagesProductHeight && width >= 770) {
            $('#description-product').height(imagesProductHeight + 30);
        } else {
            $('#description-product').css("height", "initial")
        }
    }


    window.addEventListener('DOMContentLoaded', function () {
        jQuery(window).load(function () {
            var tid = setTimeout(Ring, 5000);
            var flag = false;
            function Ring() {
                if (flag) {
                    flag = !flag;
                    jQuery("#nova_phone_div").addClass("nova-static");
                    tid = setTimeout(Ring, 10000);
                } else {
                    flag = !flag;
                    jQuery("#nova_phone_div").removeClass("nova-static");
                    tid = setTimeout(Ring, 2000);
                }
            }
        });
    });
</script>
<script>
    (function () {
        function maybePrefixUrlField() {
           if (this.value.trim() !== '' && this.value.indexOf('http') !== 0) {
              this.value = "http://" + this.value;
           }
        }

        var urlFields = document.querySelectorAll('.mc4wp-form input[type="url"]');
        if (urlFields) {
           for (var j = 0; j < urlFields.length; j++) {
              urlFields[j].addEventListener('blur', maybePrefixUrlField);
           }
        }
     })();
</script>
<script type="text/javascript">
    window.addEventListener('DOMContentLoaded', function () {
        jQuery(document).ready(function ($) {
           var parentSelector = $('.quantity');
           if (parentSelector.length) {
              var numberInputs = parentSelector.html();
              var btnLess = '<button class="minus">-</button>';
              var textInputs = numberInputs.replace('type="number"', 'type="text"');
              var btnMore = '<button class="plus">+</button>';
              parentSelector.append(btnLess + textInputs + btnMore);
              parentSelector.find('input[type="number"]').hide();
              $('.plus, .minus').on('click', function (e) {
                 e.preventDefault();
                 if ($(e.target).hasClass('plus')) {
                    var newCounter = $(this).prevAll('input.qty[type="text"]');
                    var oldCounter = $(this).prevAll('input.qty[type="number"]');
                    var counterVal = newCounter.val();
                    counterVal++;
                 } else {
                    var newCounter = $(this).nextAll('input.qty[type="text"]');
                    var oldCounter = $(this).nextAll('input.qty[type="number"]');
                    var counterVal = newCounter.val();
                    counterVal--;
                 }
                 if (counterVal <= 0) {
                    alert('Sản phẩm không hợp lệ');
                    return;
                 }
                 newCounter.val(counterVal);
                 oldCounter.val(counterVal);
              });
           }
        });
     });
</script>
<script type='text/javascript' src='{{ Theme::url('assets/js/jquery.flexslider.mineed8.js') }}' id='flexslider-js'
    defer></script>
@endpush