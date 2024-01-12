@extends('public.layout')
@section('title', 'Bạn đã tìm '. request()->get('s'))
@section('body_class', 'search search-results theme-vuhoangtelecom woocommerce-no-js')
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

    .fa.fa-star.checked {
        color: #f68620;
    }

    .az-price.text-left {
        margin-bottom: 10px;
    }

    .az-price.text-left ins {
        color: red;
        font-weight: 600;
        text-decoration: none;
        font-size: 1.3rem;
        margin-right: 4px;
        margin-bottom: 10px;
    }

    .az-price.text-left del {
        font-size: 0.9rem;
    }

    span.az-sale-label {
        font-size: 0.9rem;
        z-index: 1;
        width: 40px;
        height: 20px;
        text-align: center;
        line-height: 20px;
        background-color: red;
        color: #fff;
        display: block;
        font-size: 12px;
        margin-bottom: 15px;
        position: absolute;
        border-radius: 4px;
    }
</style>
@endpush
@section('content')
<div class="az-breadcrumb-woo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="woocommerce-breadcrumb" itemprop="breadcrumb"><a href="{{ route('home') }}">Trang chủ</a><span> &raquo;
                    </span>Kết quả tìm kiếm cho {{ request()->get('s') }}</nav>
            </div>
        </div>
    </div>
</div>
<div class="az-wp ">
    <div class="container">
        <div class="row pt-30 pb-30">
            <div class="col-md-12">
                <header class="az-content-header-search pb-30">
                    <h1 class="az-post-title text-center">Kết quả tìm kiếm cho: <em>"{{ request()->get('s') }}"</em></h1>
                </header>
            </div>
            <div class="col-md-9 content-blog">
                @foreach ($products as $item)
                <div class="row pb-30 box-item-product-search">
                    <div class="col-md-5">
                        @if ($item->hasSpecialPrice())
                            <span class="az-sale-label">-{{ $item->price_percent_convert }}%</span>
                        @endif
                        <div class="ft-img-post text-center">
                            <a href="{{ route('product.single', ['slug' => $item->slug]) }}">
                                <img width="250" height="250"
                                    src="{{ $item->base_image->path }}"
                                    class="attachment-medium size-medium wp-post-image" alt="{{ $item->name }}"
                                    loading="lazy" sizes="(max-width: 250px) 100vw, 250px" />
                            </a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="title-post pb-10">
                            <h2 class="nowrap-2">
                                <a href="{{ route('product.single', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                            </h2>
                            <div>
                                <p class="date-time">
                                    @if ($item->sku)
                                    SKU: <span>KN-S45F</span> |
                                    @endif
                                    @if ($item->brand->id > 0)
                                    Hãng SX: <span><a href="{{ route('product.brand', ['slug' => $item->brand->slug]) }}"> {{ $item->brand->name }}</a></span>
                                    @endif
                                </p>
                                @php
                                    $avgRating = ceil($item->getAvgReviews());
                                @endphp
                                @for ($i = 0; $i < $avgRating; $i++)
                                <span class="fa fa-star checked"></span>
                                @endfor
                                @for ($i = 0; $i < 5 - $avgRating; $i++)
                                <span class="fa fa-star"></span>
                                @endfor
                            </div>
                        </div>
                        <div class="az-price text-left">
                             @if($item->contact_for_price)
                            	<ins>Giá liên hệ</ins>
                            @elseif ($item->hasSpecialPrice())
                               <ins>{{ $item->selling_price->format() }}</ins>
                               <del>{{ $item->price->format() }}</del>
                            @else
                            	<ins>{{ $item->selling_price->format() }}</ins>
                            @endif
                        </div>
                        <div class="excerpt-post">
                            {!! $item->short_description !!}
                        </div>
                        <div class="row pt-30">
                            <div class="col-md-12" style="padding:0px;">
                                <div class="btn-mua-ngay">
                                    <a class="btn btn-danger btn-add-to-cart"
                                        style="width: 130px; background: #eb1c24; border: 1px solid #eb1c24;"
                                        href="#" data-id="{{ $item->id }}">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Mua Ngay</a>
                                    <a class="btn btn-primary"
                                        style="width:130px; border: 1px solid #3D91CD;background: #3D91CD;" href="{{ route('product.single', ['slug' => $item->slug]) }}">Xem
                                        Thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="navigation pt-20 text-center">
                    {!! $products->appends(['s' => request()->get('s')])->links('public.product.paginate.search_result_custom') !!}
                </div>
            </div>
            <div class="col-md-3 nn-sidebar">
                <div class="sidebar">
                    <h4 class="title-sidebar">Danh mục tin tức</h4>
                    <div class="content-sidebar pt-15 pb-15">
                        <ul class="list-category">
                            @foreach ($groups as $group)
                            <li class=""><a href="#">{{ $group->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="sidebar mt-30">
                    <h4 class="title-sidebar">Sản phẩm mới</h4>
                    <div class="content-sidebar pt-15 pb-15">
                        @foreach ($newProducts as $product)
                        <div class="row row-sidebar-product">
                            <div class="col-md-4">
                                <div class="img-product">
                                    <a href="{{ route('product.single', ['slug' => $product->slug]) }}">
                                        <img src="{{ $product->base_image->path }}"
                                            alt="{{ $product->name }}">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="title-product">
                                    <h4><a href="{{ route('product.single', ['slug' => $product->slug]) }}">{{ $product->name }}</a></h4>
                                </div>
                                <div class="price-product mt-5">
                                     @if($product->contact_for_price)
                                     <p>Giá liên hệ</p>
                                     @elseif ($product->hasSpecialPrice())
                                    <p>
                                        {{ $product->selling_price->format() }} <span>{{ $product->price->format()}}</span>
                                    </p>
                                    @else
                                    <p>{{ $product->selling_price->format() }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="{{ route('cart.items.store') }}" method="post" id="store-product">
@csrf
<input type="hidden" name="product_id" id="product_id">
<input type="hidden" name="qty" value="1">
</form>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('.btn-add-to-cart').click(function(e){
            e.preventDefault();
            $('#product_id').val($(this).data('id'));
            $('#store-product').submit();
        });
    });
</script>
@endpush
