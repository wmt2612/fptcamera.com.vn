@extends('v2.layout.master')
@section('content')
    <div class="d-none">
        <h1>{{ setting('store_name') }}</h1>
    </div>
    <section class="banner_main">
        <div class="container">
            <div class="row banner">
                <div class="category">
                </div>
                <div class="banner_slide custem_slider">
                    <ul>
                        @foreach ($slider->slides as $key => $slide)
                            <li>
                                <a href="{!! $slide->call_to_action_url !!}">
                                    <img  src="{{ $slide->file->path }}" alt="{!! $slide->caption_1 ?? 'banner slide' !!}" loading="lazy">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="banner_right">
                    <ul>
                        @foreach ($sliderbanners->slides as $key => $slide)
                            <li>
                                <a href="{{ $slide->call_to_action_url }}">
                                    <img loading="lazy" src="{{ $slide->file->path }}" alt="{{ $slide->caption_1 ?? 'banner slide right' }}">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="accessory custem_slider">
        <div class="container">
            <div class="title home_title">
                <h2>
                    <span class="title-main">{{ $homecate->root()->name }}</span>
                </h2>
            </div>
            <div class="row accessory_slider ">
                @foreach ($homecate->menus() as $menu)
                    <div class="col-lg-2 col-md-3 col-4">
                        <div class="box">
                            <div class="title"><a href="{{ $menu->url() }}">
                                    <div class="img bg_category">
                                        <img loading="lazy" src="{{ $menu->backgroundImage() }}" alt="{{ $menu->name() }}">
                                    </div>
                                </a></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="banner_bottom">
                    <a href="{{ $homebanner01_url }}">
                        <img loading="lazy" src="{{ $homebanner01 }}" alt="banner1">
                    </a>
                </div>
            </div>
        </div>
    </section>

    @if($flashSaleSection->status)
        <section class="flas_sale custem_slider">
            <div class="container ">
                <div class="row pd_12">
                    <div class="bg_linear">
                        <div class="flas_sale-top">
                            <div class="title">
                                <h2>F<img loading="lazy" src="{{ v(Theme::url("assets/v2/images/flas.svg")) }}" alt="flash sale">ash sale </h2>
                            </div>
                        </div>
                        <div class="row bg_flas flas_slide product_slider">
                            @foreach($flashSaleSection->products as $product)
                                <div class="col-lg-3 col-md-6 col-12 box">
                                    <div class="box_product">
                                        <div class="img">
                                            <a href="{{ $product->url() }}"><img loading="lazy" src="{{ $product->thumbnail() }}"
                                                                                 alt="{{ $product->name }}"></a>
                                        </div>
                                        <div class="title">
                                            <h3>
                                                <a href="{{ $product->url() }}">{{ $product->name }}</a>
                                            </h3>
                                        </div>
                                        <div class="price-wrapper">
                                            <div class="price">
                                                @if($product->contact_for_price)
                                                    <p style="color: red">Giá liên hệ</p>
                                                @elseif ($product->hasSpecialPrice())
                                                    <p>{{ $product->selling_price->format() }}</p>
                                                    <span class="sale">{{ $product->price->format() }}</span>
                                                @else
                                                    <p>{{ $product->selling_price->format() }}</p>
                                                @endif

                                            </div>
                                            <div class="star-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="flash-sale-process">
                                                <div class="text">Đã bán {{ $product->viewed }}</div>
                                                <div class="icon_hot"><img
                                                            src="{{ v(Theme::url("assets/v2/images/flash-sale.png")) }}"
                                                            alt="sold">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="product-attribute">
                                            <i class="fas fa-gift"></i>
                                            <p>{{ $product->gift_note ?? 'Nhận quà tặng và ưu đãi hấp dẫn khi mua trực tuyến' }} </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif

    @if($dealSection->status)
        <section class="lock_smart custem_slider ">
            <div class="container">
                <div class="title home_title">
                    <h2>
                        <span class="title-main">{{ $dealSection->title }}</span>
                        <div class="sub_title">
                            <div class="tab">
                                @foreach($dealSection->categories as $category)
                                    <a href="{{ route('product.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                            <div class="view_more">
                                <a href="{{ $dealSection->view_more_link }}">{{ $dealSection->view_more_title }} <i
                                            class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </h2>
                </div>
                <div class="row product_slider">
                    @foreach($dealSection->products as $product)
                        @include('v2.product.single')
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if($j4uSection->status)
        <section class="lock_smart custem_slider ">
            <div class="container">
                <div class="title home_title">
                    <h2>
                        <span class="title-main">{{ $j4uSection->title }}</span>
                        <div class="sub_title">
                            <div class="tab">
                                @foreach($j4uSection->categories as $category)
                                    <a href="{{ route('product.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                            <div class="view_more">
                                <a href="{{ $j4uSection->view_more_link }}">{{ $j4uSection->view_more_title }} <i
                                            class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </h2>
                </div>
                <div class="row product_slider">
                    @foreach($j4uSection->products as $product)
                        @include('v2.product.single')
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section>
        <div class="container">
            <div class="row">
                <div class="banner_bottom">
                    <a href="{{ $homebanner02_url }}">
                        <img loading="lazy" src="{{ $homebanner02 }}" alt="banner2">
                    </a>
                </div>
            </div>
        </div>
    </section>

    @if($newestProductSection->status)
        <section class="lock_smart custem_slider ">
            <div class="container">
                <div class="title home_title">
                    <h2>
                        <span class="title-main">{{ $newestProductSection->title }}</span>
                        <div class="sub_title">
                           <div class="tab">
                               @foreach($newestProductSection->categories as $category)
                                   <a href="{{ route('product.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                               @endforeach
                           </div>
                            <div class="view_more">
                                <a href="{{ $newestProductSection->view_more_link }}">{{ $newestProductSection->view_more_title }}</a>
                            </div>
                        </div>
                    </h2>
                </div>
                <div class="row product_slider">
                    @foreach($newestProductSection->products as $product)
                        @include('v2.product.single')
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @foreach($customSections as $customSection)
        @if($customSection->status)
            <section class="lock_smart custem_slider ">
                <div class="container">
                    <div class="title home_title">
                        <h2>
                            <span class="title-main">{{ $customSection->title }}</span>
                            <div class="sub_title">
                                @if(count($customSection->categories) > 0)
                                    <div class="tab">
                                        @foreach($customSection->categories as $category)
                                            <a href="{{ route('product.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="view_more">
                                    <a href="{{ $customSection->view_more_link }}">{{ $customSection->view_more_title }}
                                        <i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </h2>
                    </div>
                    <div class="row product_slider">
                        @foreach($customSection->products as $product)
                            @include('v2.product.single')
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

    @endforeach


    <section class="special_offer custem_slider">
        <div class="container">
            <div class="title home_title">
                <h2>
                    <span class="title-main">{{ setting('home_deal_banners_title') }}</span>
                </h2>
            </div>
            <div class="row">
                @foreach ($sliderbanners->slides as $key => $slide)
                    <div class="col-lg-3 col-md-3 col-12">
                        <a href="{{ $slide->call_to_action_url }}">
                            <div class="img">
                                <img loading="lazy" src="{{ $slide->file->path }}" alt="{{ $slide->caption_1 ?? 'slide banner' }}">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="news_home custem_slider">
        <div class="container">
            <div class="title home_title">
                <h2>
                    <span class="title-main">TIN MỚI NHẤT</span>
                    <div class="sub_title">
                        <div class="view_more">
                            <a href="{{ route('blog.index') }}">Xem Thêm Tin</a>
                        </div>
                    </div>
                </h2>
            </div>
            <div class="row news_slider">
                @foreach($latest_posts as $key => $post)
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="box">
                            <div class="img">
                                <img loading="lazy" src="{{ $post->thumbnail() }}" alt="{{ $post->name }}">
                            </div>
                            <div class="content">
                                <div class="title">
                                    <h4><a href="{{ $post->url() }}">{{ $post->name }}</a></h4>
                                </div>
                                <div class="text">
                                    <p> {{ $post->excerpt() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection