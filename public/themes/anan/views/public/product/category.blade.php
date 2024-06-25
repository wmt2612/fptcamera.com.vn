@extends('public.layout')
@section('title', $category->meta->meta_title ?: $category->name)
@section('body_class', 'archive tax-product_cat term-dich-vu-lap-dat-tron-bo term-55 theme-vuhoangtelecom woocommerce
woocommerce-page woocommerce-no-js')

@push('styles')
<style>
    .product__tab-new.filter_sort a.nav-link {
        cursor: pointer;
    }


    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 200;
        top: 0;
        left: 0;
        background-color: rgb(255, 255, 255);
        overflow-x: hidden;
        transition: 0.5s;
    }

    .sidenav-overlay {
        box-shadow: 0 0 0 2000px #000000ab;
    }

    .sidenav .header-sidenav {
        text-align: left;
        padding: 1rem;
        background-color: rgb(61, 141, 201);
    }

    .sidenav .header-sidenav .btn-close-sidenav {
        cursor: pointer;
        font-size: 27px;
        color: #f1f1f1;
    }

    .sidenav .header-sidenav .header-img {
        width: 120px;
        height: 100%;
        float: right;
        overflow: hidden;
    }

    . .sidenav .header-sidenav .header-img img {
        width: 110px;
    }

    .sidenav .item-nav {
        width: 100%;
        text-align: left;
    }

    .sidenav .item-nav .item-title-bar {
        display: flex;
        align-items: center;
        position: relative;
        border-bottom: 2px solid #a79e9e5c;
        padding: 1rem;
        font-size: 19px;

    }

    .sidenav .item-nav .item-title-bar .btn-dropdown {
        position: absolute;
        right: 20px;
        font-size: 20px;
        color: #3f3d3d;
        cursor: pointer;

    }

    .sidenav .item-nav .item-list-nav {
        padding: 0.5rem 2rem;
        display: none;
    }

    .sidenav .item-nav .item-list-nav .item-filter-input {
        margin-right: 1rem;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
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
                    <a href="{{ route('product.index') }}">Sản phẩm</a><span> »
                        {!! $breadcrumb !!}
                        {{ $category->name }}
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="az-wp">
    <div class="container">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <div class="row">
                    <div class="col-md-3 pr-md-2 az-archive-sidebar-product">
                        <aside class="az-sidebar-left">
                            <button class="btn d-inline-block d-md-none az-advance-filter-close"><i class="fa fa-times"
                                    aria-hidden="true"></i></button>
                            <input type="hidden" id="az_product_catid" value="55" /><input type="hidden"
                                id="az_product_catname" value="Dịch vụ lắp đặt trọn bộ" />
                            <div class="az-widget-box">
                                <h1 class="az-title">{{ $category->name }}</h1>
                                <div class="az-content"
                                    style="max-height: 280px; overflow-y: auto; overflow-x: hidden;">
                                    <ul>
                                        @foreach ($category->children as $item)
                                        <li>
                                            <a href="{{ route('product.category', ['slug' => $item->slug ]) }}">
                                                <h2>{{ $item->name }}</h2>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="az-widget-box">
                                <h4 class="az-title">Theo thương hiệu</h4>
                                <div method="GET" class="az-content">
                                    <ul class=" az-filter">
                                        @foreach($brands as $brand)
                                            @if($brand->translation)
                                            <li>
                                                <label class="filter-checkbox-label">
                                                    <input onchange="return updateValue(this)" class="filter-checkbox"
                                                        name="brand" value="{{$brand->id}}" data-name="price"
                                                        type="checkbox"
                                                        {{ request()->get('brand') == $brand->id ? 'checked' : '' }}>
                                                    {{$brand->translation->name}}
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="az-widget-box">
                                <h4 class="az-title">Theo trị giá</h4>
                                <div class="az-content">
                                    <ul class="az-filter-price az-filter">
                                        <li>
                                            <label class="filter-checkbox-label">
                                                <input class="filter-checkbox" data-name="price" type="checkbox"
                                                    data-max_price="1000000" data-min_price="0"
                                                    {{ request()->get('toPrice') == 1000000 ? 'checked' : '' }}>
                                                < 1 triệu <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="filter-checkbox-label">
                                                <input class="filter-checkbox" data-name="price" type="checkbox"
                                                    data-max_price="3000000" data-min_price="1000000"
                                                    {{ (request()->get('toPrice') == 3000000 && request()->get('fromPrice') == 1000000)  ? 'checked' : '' }}>
                                                1 triệu - 3 triệu
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="filter-checkbox-label">
                                                <input class="filter-checkbox" data-name="price" type="checkbox"
                                                    data-max_price="5000000" data-min_price="3000000"
                                                    {{ (request()->get('toPrice') == 5000000 && request()->get('fromPrice') == 3000000)  ? 'checked' : '' }}>
                                                3 triệu - 5 triệu
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li data-filter="81">
                                            <label class="filter-checkbox-label">
                                                <input class="filter-checkbox" data-name="price" type="checkbox"
                                                    data-max_price="8000000" data-min_price="5000000"
                                                    {{ (request()->get('toPrice') == 8000000 && request()->get('fromPrice') == 5000000)  ? 'checked' : '' }}>
                                                5 triệu - 8 triệu
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="filter-checkbox-label">
                                                <input class="filter-checkbox" data-name="price" type="checkbox"
                                                    data-max_price="10000000" data-min_price="8000000"
                                                    {{ (request()->get('toPrice') == 10000000 && request()->get('fromPrice') == 8000000)  ? 'checked' : '' }}>
                                                8 triệu - 10 triệu
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="filter-checkbox-label">
                                                <input class="filter-checkbox" data-name="price" type="checkbox"
                                                    data-min_price="10000000"
                                                    {{ request()->get('fromPrice') == 10000000  ? 'checked' : '' }}>
                                                > 10 triệu
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @foreach($attributes as $attribute)
                            <div class="az-widget-box">
                                <h4 class="az-title">{{ $attribute->name }}</h4>
                                <div class="az-content">
                                    <ul class="az-filter">
                                        @foreach($attribute->values as $value)
                                        <li>
                                            <label class="filter-checkbox-label">
                                                <input onchange="return updateValue(this)" name={{$attribute->slug}}
                                                    class="filter-checkbox" data-name={{$attribute->name}}
                                                    type="checkbox" value="{{ $value->id }}"
                                                    @if(app('request')->input($attribute->slug) == $value->id) checked
                                                @endif />
                                                {{ $value->value }}<span class="checkmark"></span>
                                            </label>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </aside>
                    </div>
                    <div class="col-md-9 az-main-product">
                        <div class="az-archive-product-list">
                            @if ($category->slider)
                            <div class="az-section">
                                <div class="owl-carousel owl-theme az-owl-one">
                                    @foreach ($category->slider->slides as $slide)
                                    <div class="item">
                                        <a href="{{ $slide->call_to_action_url }}">
                                            <img src="{{ $slide->file->path }}" alt="{{ $slide->file->name }}">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            @if ($category->children)
                            <div class="az-archive-product-list-child owl-carousel owl-theme owl-product-list-child">
                                @foreach ($category->children as $catChild)
                                <div class="box item">
                                    <div class="thumb">
                                        <a href="{{ route('product.category', ['slug' => $catChild->slug]) }}">
                                            <img src="{{ $catChild->logo->path }}" alt="{{ $catChild->name }}" />
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endif
                            <!--- Add sản phẩm nổi bật -->
                            <!-- Khuyến Mãi Hot : 16668 -->
                            <div class="col-md-12" style="border-bottom: red solid;">
                                <h2 style="font-size: 22px; color:red;">Sản Phẩm Nổi Bật</h2>
                            </div>
                            <div class="wcpscwc-product-slider-wrap  wcps- ">
                                <div class="woocommerce wcpscwc-product-slider" id="wcpscwc-product-slider-1">
                                    <ul class="products columns-4">
                                        @foreach ($featuredProducts as $item)
                                        @include('public.product.partials.item')
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="wcpscwc-slider-conf"
                                    data-conf="{&quot;slide_to_show&quot;:3,&quot;slide_to_scroll&quot;:3,&quot;autoplay&quot;:&quot;true&quot;,&quot;autoplay_speed&quot;:3000,&quot;speed&quot;:300,&quot;arrows&quot;:&quot;true&quot;,&quot;dots&quot;:&quot;true&quot;,&quot;rtl&quot;:&quot;false&quot;,&quot;slider_cls&quot;:&quot;products&quot;,&quot;loop&quot;:&quot;true&quot;}">
                                </div>
                            </div>
                            <!-- End add sp nổi bật -->
                            <div class="row az-home-row-product az-section" id="az-main-archive">
                                <div class="col-md-12">
                                    <div class="row az-title">
                                        <div class="d-block d-md-none text-center az-advance-filter-group"
                                            style="width:100%;">
                                            <button type="button" class="btn btn-primary az-advance-filter">Tìm kiếm
                                                nâng
                                                cao
                                            </button>
                                            <div class="parent-sidenav">
                                                <div id="filter-side-bar" class="sidenav">
                                                    <div class="header-sidenav">
                                                        <i id="btn-close-sidenav"
                                                            class="fa fa-times btn-close-sidenav"></i>
                                                        <div class="header-img">
                                                             <img src="{{ $mobile_header_logo }}"
                                                                alt="fptcamera" />
                                                        </div>
                                                    </div>
                                                    <div class="item-nav">
                                                        <div class="item-title-bar">
                                                            <span class="item-title">Thiết bị camera an ninh</span>
                                                            <i id="btn-dropdown-1" class="fa fa-plus btn-dropdown"></i>
                                                        </div>
                                                        <div id="filter-panel-1" class="item-list-nav">
                                                            @foreach($category->children as $item)
                                                            <form
                                                                action="{{ route('product.category', ['slug' => $item->slug])}}"
                                                                method="GET" class="item-filter">
                                                                <label class="filter-checkbox-label">
                                                                    <input onchange="this.form.submit()"
                                                                        class="filter-checkbox" name="slug"
                                                                        value="{{$item->slug}}" type="checkbox"
                                                                        {{ request()->get('slug') == $item->slug ? 'checked' : '' }}>
                                                                    {{$item->name}}
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </form>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                    <div class="item-nav">
                                                        <div class="item-title-bar">
                                                            <span class="item-title">Theo thương hiệu</span>
                                                            <i id="btn-dropdown-2" class="fa fa-plus btn-dropdown"></i>
                                                        </div>
                                                        <div id="filter-panel-2" class="item-list-nav">
                                                            @foreach($brands as $brand)
                                                             @if($brand->translation)
                                                            <div class="item-filter">
                                                                <label class="filter-checkbox-label">
                                                                    <input onchange="return updateValue(this)"
                                                                        class="filter-checkbox" name="brand"
                                                                        value="{{$brand->id}}" data-name="price"
                                                                        type="checkbox"
                                                                        {{ request()->get('brand') == $brand->id ? 'checked' : '' }}>
                                                                      {{$brand->translation->name}}
                                                                    <span class="checkmark"></span>
                                                                </label>
                                                            </div>
                                                            @endif
                                                            @endforeach

                                                        </div>
                                                        <div class="item-nav">
                                                            <div class="item-title-bar">
                                                                <span class="item-title">Theo trị giá</span>
                                                                <i id="btn-dropdown-3"
                                                                    class="fa fa-plus btn-dropdown"></i>
                                                            </div>
                                                            <div id="filter-panel-3" class="item-list-nav">
                                                                <div class="az-filter-price item-filter">
                                                                    <label class="filter-checkbox-label ">
                                                                        <input class="filter-checkbox item-filter-input"
                                                                            data-name="price" type="checkbox"
                                                                            data-max_price="999999" data-min_price="0"
                                                                            {{ request()->get('toPrice') == 999999 ? 'checked' : '' }}>
                                                                        < 1 triệu <span class="checkmark"></span>
                                                                    </label>
                                                                </div>
                                                                <div class="az-filter-price item-filter">
                                                                    <label class="filter-checkbox-label ">
                                                                        <input class="filter-checkbox item-filter-input"
                                                                            data-name="price" type="checkbox"
                                                                            data-max_price="3000000"
                                                                            data-min_price="1000000"
                                                                            {{ request()->get('fromPrice') == 1000000 ? 'checked' : '' }}>
                                                                        1 triệu - 3 triệu <span
                                                                            class="checkmark"></span>
                                                                    </label>
                                                                </div>
                                                                <div class="az-filter-price item-filter">
                                                                    <label class="filter-checkbox-label ">
                                                                        <input class="filter-checkbox item-filter-input"
                                                                            data-name="price" type="checkbox"
                                                                            data-max_price="5000000"
                                                                            data-min_price="3000000"
                                                                            {{ request()->get('fromPrice') == 3000000 ? 'checked' : '' }}>
                                                                        3 triệu - 5 triệu <span
                                                                            class="checkmark"></span>
                                                                    </label>
                                                                </div>
                                                                <div class="az-filter-price item-filter">
                                                                    <label class="filter-checkbox-label ">
                                                                        <input class="filter-checkbox item-filter-input"
                                                                            data-name="price" type="checkbox"
                                                                            data-max_price="8000000"
                                                                            data-min_price="5000000"
                                                                            {{ request()->get('fromPrice') == 5000000 ? 'checked' : '' }}>
                                                                        5 triệu - 8 triệu <span
                                                                            class="checkmark"></span>
                                                                    </label>
                                                                </div>
                                                                <div class="az-filter-price item-filter">
                                                                    <label class="filter-checkbox-label ">
                                                                        <input class="filter-checkbox item-filter-input"
                                                                            data-name="price" type="checkbox"
                                                                            data-max_price="10000000"
                                                                            data-min_price="8000000"
                                                                            {{ request()->get('fromPrice') == 8000000 ? 'checked' : '' }}>
                                                                        8 triệu - 10 triệu <span
                                                                            class="checkmark"></span>
                                                                    </label>
                                                                </div>
                                                                <div class="az-filter-price item-filter">
                                                                    <label class="filter-checkbox-label ">
                                                                        <input class="filter-checkbox item-filter-input"
                                                                            data-name="price" type="checkbox"
                                                                            data-min_price="10000000"
                                                                            {{ request()->get('fromPrice') == 10000000 ? 'checked' : '' }}>
                                                                        > 10 triệu <span class="checkmark"></span>
                                                                    </label>
                                                                </div>


                                                            </div>

                                                        </div>
                                                        @foreach($attributes as $attribute)
                                                        <div class="item-nav">
                                                            <div class="item-title-bar">
                                                                <span class="item-title">{{$attribute->name}}</span>
                                                                <i id="btn-dropdown-{{$attribute->slug}}"
                                                                    class="fa fa-plus btn-dropdown"></i>
                                                            </div>
                                                            <div id="filter-panel-{{$attribute->slug}}"
                                                                class="item-list-nav">
                                                                @foreach($attribute->values as $value)
                                                                <div class="item-filter">
                                                                    <label class="filter-checkbox-label">
                                                                        <input onchange="return updateValue(this)"
                                                                            name={{$attribute->slug}}
                                                                            class="filter-checkbox"
                                                                            data-name={{$attribute->name}}
                                                                            type="checkbox" value="{{ $value->id }}"
                                                                            @if(app('request')->input($attribute->slug)
                                                                        == $value->id) checked @endif />
                                                                        {{ $value->value }}<span
                                                                            class="checkmark"></span>
                                                                    </label>


                                                                </div>

                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <ul class="nav nav-tabs product__tab-new filter_sort">
                                            <input type="hidden" id="sort"
                                                value="{{ request()->get('sort') ?? 'bestsale' }}">
                                            <input type="hidden" id="category" value="{{ $category->slug }}">
                                            <li class="nav-item nav-title">
                                                <span>Ưu tiên Xem</span>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ !request()->get('sort') ? 'active' : '' }} {{ request()->get('sort') == 'bestsale' ? 'active' : '' }}"
                                                    data-value="bestsale">Top bán chạy</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ request()->get('sort') == 'latest' ? 'active' : '' }}"
                                                    data-value="latest">Mới nhất</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ request()->get('sort') == 'pricehightolow' ? 'active' : '' }}"
                                                    data-value="pricehightolow">Giá cao</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link {{ request()->get('sort') == 'pricelowtohigh' ? 'active' : '' }}"
                                                    data-value="pricelowtohigh">Giá thấp</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="top" role="tabpanel"
                                                aria-labelledby="top-tab">
                                                <div class="col-md-12 az-content">
                                                    @foreach ($products as $item)
                                                    @include('public.product.partials.item')
                                                    @endforeach
                                                    {!! $products->links('public.product.paginate.custom') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="az-archive-product-desciption">
                                <div class="term-description">
                                    {!! $category->intro !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($attributes as $attribute)
                    <script type="text/javascript">
                        window.addEventListener('DOMContentLoaded', function() {
                            jQuery(document).ready(function($) {
                                $("document").ready(function() {
                                $('#btn-dropdown-<?php echo $attribute->slug  ?>').click(function() {
                                    if($(this).hasClass('fa-plus')) {
                                        $(this).removeClass("fa-plus");
                                        $(this).addClass("fa-minus");
                                    }else{
                                        $(this).removeClass("fa-minus");
                                        $(this).addClass("fa-plus");
                                    }
                                    $('#filter-panel-<?php echo $attribute->slug ?>').slideToggle('fast');
                                });
                                });
                            });
                        });             
                       
                    </script>
                    @endforeach
                    <script type="text/javascript">
                        window.addEventListener('DOMContentLoaded', function () {
                   jQuery(document).ready(function ($) {
                      $(window).scroll(function () {
                         if ($(this).scrollTop() > 270) {
                            $('.az-advance-filter').addClass('fixed');
                            $('.az-advance-filter').text('');
                         } else {
                            $('.az-advance-filter').removeClass('fixed');
                            $('.az-advance-filter').text('Tìm kiếm nâng cao');
                         }
                      });

                      $(".az-advance-filter").click(function() {
                         $("#filter-side-bar").css("width", "320px");
                         $("#filter-side-bar").addClass("sidenav-overlay");
                      });

                      $("#btn-close-sidenav").click(function() {
                        $("#filter-side-bar").css("width", "0");
                          $("#filter-side-bar").removeClass("sidenav-overlay");
                         
                      })

                      $("#btn-dropdown-1").click(function() {
                         if($(this).hasClass('fa-plus')) {
                            $(this).removeClass("fa-plus");
                            $(this).addClass("fa-minus");
                          }else{
                            $(this).removeClass("fa-minus");
                            $(this).addClass("fa-plus");
                          }
                          $("#filter-panel-1").slideToggle('fast');
                         
                      });

                      $("#btn-dropdown-2").click(function() {
                        if($(this).hasClass('fa-plus')) {
                            $(this).removeClass("fa-plus");
                            $(this).addClass("fa-minus");
                          }else{
                            $(this).removeClass("fa-minus");
                            $(this).addClass("fa-plus");
                          }
                          $("#filter-panel-2").slideToggle('fast');
                      });

                      $("#btn-dropdown-3").click(function() {
                        if($(this).hasClass('fa-plus')) {
                            $(this).removeClass("fa-plus");
                            $(this).addClass("fa-minus");
                          }else{
                            $(this).removeClass("fa-minus");
                            $(this).addClass("fa-plus");
                          }
                          $("#filter-panel-3").slideToggle('fast');
                      });

                    
                   })
                });
                function updateValue(e) {
                    const value = e.value;
                    const slug = e.name;
                    const checked = e.checked;
                    const queryString = window.location.search;
                    const urlParams = new URLSearchParams(queryString);
                    const
                        keys = urlParams.keys(),
                        values = urlParams.values(),
                        entries = urlParams.entries();
                    let uniqueParams = [];
                    let paramsUrl = '';
                   
                    paramsUrl += 'sort=' + 'bestsale';
                    if(urlParams.get('sort') !== 'bestsale') {
                        paramsUrl = 'sort=' + urlParams.get('sort');
                    }
                    for(const entry of entries) {
                        if(entry[0] !== slug && entry[0] !== 'sort') {
                            uniqueParams.push(entry); 
                        } 
                    }
                    if(uniqueParams.length > 0) {
                        uniqueParams.forEach(param => {
                            paramsUrl += '&&' + param[0] + '=' + param[1];
                        });
                    }     
                    if(checked) {
                        paramsUrl += '&&' + slug + '=' + value;
                    } else {
                        paramsUrl += '';
                    }               
                    const url = window.location.origin + window.location.pathname + "?" + `${paramsUrl}` ;
                    window.location.replace(url);
                }

                    </script>
                </div>
                <!--container-->
        </div>
    </div>

    @endsection
    @push('scripts')
    <script src="{{ Theme::url('assets/js/search.category.js') }}"></script>
    @endpush