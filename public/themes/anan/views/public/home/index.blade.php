@extends('public.layout')

@section('title', setting('store_tagline'))

@section('content')
<div class="az-wp ">
    <div class="container">
        <h1 style="display: none">{{ setting('store_name') }}</h1>
        <div class="row az-r1 az-section">
            <div class="col-lg-3 az-megamenu d-none d-lg-block"></div>
            <div class="col-lg-9 px-md-0 center">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @foreach ($slider->slides as $key => $slide)
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}"
                            class="@if($key==0) active @endif"></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($slider->slides as $key => $slide)
                        <div class="carousel-item @if($key==0) active @endif">
                            <a href="{!! $slide->call_to_action_url !!}">
                                <img width="711" height="416" src="{{ $slide->file->path }}"
                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                    alt="{!! $slide->caption_1 !!}" loading="lazy"
                                    sizes="(max-width: 711px) 100vw, 711px" />
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3 right px-md-0 d-none d-xl-block">
                @foreach ($sliderbanners->slides as $key => $slide)
                <div class="img_qc">
                    <a href="{{ $slide->call_to_action_url }}">
                        <img src="{{ $slide->file->path }}">
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row az-r2 az-section">
            <div class="col-md-12 az-title">
                <h4>{{ $homecate->root()->name }}</h4>
            </div>
            <div class="owl-carousel owl-theme owl-qc">

                @foreach ($homecate->menus() as $menu)
                <div class="item">
                    <a href="{{ $menu->url() }}">
                        <img src="{{ $menu->backgroundImage() }}">
                    </a>
                </div>
                @endforeach

            </div>
        </div>
        <div class="row az-r4 az-section">
            <div class="banner-qc">
                <a href="{{ $homebanner01_url }}">
                    <img src="{{ $homebanner01 }}">
                </a>
            </div>
        </div>
        @if($dealSection->status)
        <div class="row az-home-row-product az-section">
            <div class="col-md-12">
                <style type="text/css">
                    .row.az-home-row-product.az-section .az-title.onsale {
                        position: relative;
                    }

                    .row.az-home-row-product.az-section .az-title.onsale:before {
                        content: "";
                        position: absolute;
                        background-image: url("{{ Theme::url('assets/images/iconsale.jpg ') }}");
                        left: 10px;
                        top: 50%;
                        transform: translateY(-50%);
                        width: 35px;
                        height: 35px;
                    }

                    .az-home-row-product .az-title.onsale h4,
                    .az-home-row-product .az-title.onsale h2 {
                        padding-left: 50px !important;
                    }
                </style>
                <div class="row az-title onsale">
                    <div class="col-md-12">
                        <h2>{{ $dealSection->title }}</h2>
                        <p class="subtitle-pro-homepage">
                            {{ $dealSection->desc }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 az-content px-md-0">
                @foreach($dealSection->products as $product)
                <div class="az-product-item " data-status="61">
                    <div class="az-overflow">
                        <span class="az-sale-label">-{{ $product->price_percent_convert }}%</span>
                        <a href="{{ $product->url() }}" class="nt-img d-block">
                            <img width="200" height="200" src="{{ $product->thumbnail() }}"
                                class="attachment-thumbnail size-thumbnail wp-post-image" alt="{{ $product->name }}"
                                loading="lazy" sizes="(max-width: 200px) 100vw, 200px" /> </a>
                        <a href="{{ $product->url() }}" class="az-box-product-des">
                            <h3 class="az-title-post nowrap-2 text-left">
                                {{ $product->name }}
                            </h3>
                            <div class="az-price text-left">
                                @if($product->contact_for_price)
                                <ins style="color: red">Giá liên hệ</ins>
                                @elseif ($product->hasSpecialPrice())
                                <ins>{{ $product->selling_price->format() }}</ins>
                                <del>{{ $product->price->format() }}</del>
                                @else
                                <ins>{{ $product->selling_price->format() }}</ins>
                                @endif
                            </div>
                            <!-- Progress Bar -->
                            <div class="progress">
                                <div class="progress-bar" style="width: 0%" role="progressbar" aria-valuenow="20"
                                    aria-valuemin="0" aria-valuemax="100">
                                    <span class="nn-icon">
                                        Vừa mở bán </span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-12">
                <div class="nt-loadmore pt-30 pb-30 text-center">
                    <a href="{{ $dealSection->view_more_link }}">{{ $dealSection->view_more_title }} <i
                            class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        @endif

        @if($j4uSection->status)
        <div class="row az-home-row-product az-section">
            <div class="col-md-12">
                <div class="row az-title ">
                    <div class="col-md-12">
                        <h2>{{ $j4uSection->title }}</h2>
                        <p class="subtitle-pro-homepage">
                            {{ $j4uSection->desc }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 az-content px-md-0">
                @foreach($j4uSection->products as $product)
                <div class="az-product-item ">
                    <div class="az-overflow">
                        <span class="az-sale-label">-{{ $product->price_percent_convert }}%</span> <a
                            href="{{ $product->url() }}" class="nt-img d-block">
                            <img width="300" height="300" src="{{ $product->thumbnail() }}"
                                class="attachment-thumbnail size-thumbnail wp-post-image" alt="{{ $product->name }}"
                                loading="lazy" sizes="(max-width: 300px) 100vw, 300px" /> </a>
                        <a href="{{ $product->url() }}" class="az-box-product-des">
                            <h3 class="az-title-post nowrap-2 text-left">{{ $product->name }}</h3>
                            <div class="az-price text-left">
                                @if($product->contact_for_price)
                                <ins style="color: red">Giá liên hệ</ins>
                                @elseif ($product->hasSpecialPrice())
                                <ins>{{ $product->selling_price->format() }}</ins>
                                <del>{{ $product->price->format() }}</del>
                                @else
                                <ins>{{ $product->selling_price->format() }}</ins>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-12">
                <div class="nt-loadmore pt-30 pb-30 text-center">
                    <a href="{{ $j4uSection->view_more_link }}">{{ $j4uSection->view_more_title }} <i
                            class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        @endif

        <div class="row az-r7 az-section">
            <div class="banner-qc">
                <a href="{{ $homebanner02_url }}">
                    <img src="{{ $homebanner02 }}">
                </a>
            </div>
        </div>

        @if($newestProductSection->status)
        <div class="row az-home-row-product az-section">
            <div class="col-md-12">
                <div class="row az-title ">
                    <div class="col-md-12">
                        <h2>{{ $newestProductSection->title }}</h2>
                        <p class="subtitle-pro-homepage">
                            {{ $newestProductSection->desc }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 az-content px-md-0">
                @foreach($newestProductSection->products as $product)
                <div class="az-product-item ">
                    <div class="az-overflow">
                        @if( $product->hasSpecialPrice() )
                        <span class="az-sale-label">-{{ $product->price_percent_convert }}%</span>
                        @endif
                        <a href="{{ $product->url() }}" class="nt-img d-block">
                            <img width="300" height="300" src="{{ $product->thumbnail() }}"
                                class="attachment-thumbnail size-thumbnail wp-post-image" alt="{{ $product->name }}"
                                loading="lazy" sizes="(max-width: 300px) 100vw, 300px" />
                        </a>
                        <a href="{{ $product->url() }}" class="az-box-product-des">
                            <h3 class="az-title-post nowrap-2 text-left">{{ $product->name }}</h3>
                            <div class="az-price text-left">
                                @if($product->contact_for_price)
                                <ins style="color: red">Giá liên hệ</ins>
                                @elseif ($product->hasSpecialPrice())
                                <ins>{{ $product->selling_price->format() }}</ins>
                                <del>{{ $product->price->format() }}</del>
                                @else
                                <ins>{{ $product->selling_price->format() }}</ins>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-12">
                <div class="nt-loadmore pt-30 pb-30 text-center">
                    <a href="{{ $newestProductSection->view_more_link }}">{{ $newestProductSection->view_more_title }} <i
                        class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        @endif

        @if($customV1Section->status)
        <div class="row az-home-row-product az-section">
            <div class="col-md-12">
                <div class="row az-title ">
                    <div class="col-md-12">
                        <h2>{{ $customV1Section->title }}</h2>
                        <p class="subtitle-pro-homepage">
                            {{ $customV1Section->desc }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 az-content px-md-0">
                @foreach($customV1Section->products as $product)
                <div class="az-product-item ">
                    <div class="az-overflow">
                        @if( $product->hasSpecialPrice() )
                        <span class="az-sale-label">-{{ $product->price_percent_convert }}%</span>
                        @endif
                        <a href="{{ $product->url() }}" class="nt-img d-block">
                            <img width="300" height="300" src="{{ $product->thumbnail() }}"
                                class="attachment-thumbnail size-thumbnail wp-post-image" alt="{{ $product->name }}"
                                loading="lazy" sizes="(max-width: 300px) 100vw, 300px" />
                        </a>
                        <a href="{{ $product->url() }}" class="az-box-product-des">
                            <h3 class="az-title-post nowrap-2 text-left">{{ $product->name }}</h3>
                            <div class="az-price text-left">
                                @if($product->contact_for_price)
                                <ins style="color: red">Giá liên hệ</ins>
                                @elseif ($product->hasSpecialPrice())
                                <ins>{{ $product->selling_price->format() }}</ins>
                                <del>{{ $product->price->format() }}</del>
                                @else
                                <ins>{{ $product->selling_price->format() }}</ins>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-12">
                <div class="nt-loadmore pt-30 pb-30 text-center">
                    <a href="{{ $customV1Section->view_more_link }}">{{ $customV1Section->view_more_title }} <i
                        class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
        @endif

        <div class="row az-content-post">
            <div class="col-md-12">
                <div class="title">
                    <h2 class="color-title bold text-center">Thông tin hữu ích</h2>
                </div>
            </div>
            <div class="col-md-12 az-content">
                <div class="tab-content">
                    <div class="row-news">
                        <div class="row">

                            <div class="col-lg-6 ft-post mb-4">
                                @foreach($latest_posts as $key => $post)
                                @if($key==0)
                                <div class="ft-img-post text-center">
                                    <a href="{{ $post->url() }}">
                                        <img src="{{ $post->thumbnail() }}">
                                    </a>
                                </div>
                                <div class="title-post">
                                    <h4><a href="{{ $post->url() }}">{{ $post->name }}</a>
                                    </h4>
                                    <!--<p class="date-time">Đăng vào ngày: <span>26/07/2021</span></p>-->
                                </div>
                                <div class="excerpt-post nowrap-3">
                                    Camera giám sát không chỉ giúp bạn an tâm theo dõi thú cưng khi đi không ở nhà mà
                                    còn giúp bảo vệ căn nhà của bạn 24/7.
                                </div>
                                @endif
                                @endforeach
                            </div>
                            <div class="col-lg-6 right-post">
                                @foreach($latest_posts as $key => $post)
                                @if($key>0)
                                <div class="row pb-15">
                                    <div class="col-md-6">
                                        <div class="ft-img-post text-center">
                                            <a href="{{ $post->url() }}">
                                                <img width="400" height="250" src="{{ $post->thumbnail() }}"
                                                    class="attachment-medium size-medium wp-post-image"
                                                    alt="{{ $post->name }}" loading="lazy"
                                                    sizes="(max-width: 400px) 100vw, 400px" /> </a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="title-post pb-20">
                                            <h4 class="nowrap-2">
                                                <a href="{{ $post->url() }}">{{ $post->name }}</a>
                                            </h4>
                                            <!--<p class="date-time">Ngày đăng: <span>26/07/2021</span></p>-->
                                        </div>
                                        <div class="excerpt-post nowrap-3">
                                            {{ $post->excerpt() }}
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach

                            </div>
                            <div class="col-md-12">
                                <div class="nt-loadmore pt-30 pb-30 text-center">
                                    <a href="{{ route('blog.index') }}">Xem thêm <i class="fa fa-angle-right"
                                            aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
    <!--container-->
</div>
@endsection