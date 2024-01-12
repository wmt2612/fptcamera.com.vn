@extends('public.layout') 
@section('title', 'Blog') 
@section('body_class', 'blog theme-vuhoangtelecom woocommerce-no-js') 
@section('content')
<div class="az-breadcrumb-woo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="woocommerce-breadcrumb" itemprop="breadcrumb">
                	<a href="/">Trang chủ</a>
                	<span> &raquo; </span>Blog
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="az-wp">
    <div class="container">
        <h1 style="display: none;">Blog</h1>
        <div class="row pb-30">
            <div class="col-md-12">
                <style>
                    .az_list_cat_owl {
                        position: relative;
                    }
                    .az_list_cat_owl .owl-nav .owl-prev {
                        position: absolute;
                        left: 0;
                    }
                    .az_list_cat_owl .owl-nav .owl-next {
                        position: absolute;
                        right: 0;
                    }
                    .az_list_cat_owl .owl-nav .owl-prev,
                    .az_list_cat_owl .owl-nav .owl-next {
                        top: 50%;
                        transform: translateY(-85%);
                    }
                    .az_list_cat_owl .owl-nav [class*="owl-"] {
                        width: 25px;
                        height: 25px;
                        border-radius: 100%;
                        padding: 0;
                        color: #333;
                        font-weight: bold;
                        text-align: center;
                        padding-top: 4px;
                        font-size: 12px;
                    }
                </style>
                <section class="news-category">
                    <div class="ModuleContent">
                        <div class="category-list">
                            <div class="owl-carousel owl-theme az_list_cat_owl">
                                @foreach ($blogcategory_slider->slides as $key => $slide)
                                <div class="item">
                                    <a class="category-item" href="{!! $slide->call_to_action_url !!}" target="_self">
                                        <div class="img">
                                            <img alt="{!! $slide->call_to_action_text !!}" src="{{ $slide->thumbnail() }}" />
                                        </div>
                                        <div class="caption">
                                            <div class="name">{!! $slide->call_to_action_text !!}</div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-9 content-blog">
                <div class="box">
                    <div class="box-title">
                        <h2><a href="{{ $catemain1->url() }}">{{ $catemain1->name }}</a></h2>
                        <a href="{{ $catemain1->url() }}">Xem thêm <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                    <style>
                        ins {
                            text-decoration: none;
                            font-size: 20px;
                            color: red;
                            font-weight: 700;
                        }
                        del {
                            font-size: 13px;
                            color: #858584;
                            margin-left: 5px;
                        }
                        .az-sale-label {
                            z-index: 1;
                            width: 40px;
                            height: 20px;
                            text-align: center;
                            line-height: 20px;
                            background-color: red;
                            color: white;
                            display: block;
                            font-size: 12px;
                            margin-bottom: 15px;
                            position: absolute;
                            border-radius: 4px;
                        }
                        .checked {
                            color: orange;
                        }
                    </style>
                    @foreach($main1 as $key => $post)
                    <div class="row pb-30">
                        <div class="col-md-6">
                            <div class="ft-img-post">
                                <a href="{{ $post->url() }}">
                                    <img width="400" height="250" src="{{ $post->thumbnail() }}" class="attachment-medium size-medium wp-post-image" alt="{{ $post->name }}" loading="lazy" sizes="(max-width: 400px) 100vw, 400px" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="title-post pb-10">
                                <h2 class="nowrap-2">
                                    <a href="{{ $post->url() }}">{{ $post->name }}</a>
                                </h2>
                                <p class="date-time">Đăng vào ngày: <span>{{ $post->date_format }}</span></p>
                            </div>
                            <div class="excerpt-post nowrap-3">
                                {{ $post->excerpt() }}
                            </div>
                            <div class="btn-load-more pt-30">
                                <a href="{{ $post->url() }}">Xem Thêm</a>
                            </div>
                        </div>
                    </div>
                    <!-- end box -->
                    @endforeach
                </div>

                <div class="box box-gird">
                    <div class="box-title">
                        <h2><a href="{{ $catemain2->url() }}">{{ $catemain2->name }}</a></h2>
                        <a href="{{ $catemain2->url() }}">Xem thêm <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="row">
                        @foreach($main2 as $key => $post)
                        <div class="col-md-6">
                            <div class="ft-img-post">
                                <a href="{{ $post->url() }}">
                                    <img width="400" height="250" src="{{ $post->thumbnail() }}" class="attachment-medium size-medium wp-post-image" alt="{{ $post->name }}" loading="lazy" sizes="(max-width: 400px) 100vw, 400px" />
                                </a>
                            </div>
                            <div class="title-post pb-10">
                                <h4 class="nowrap-2">
                                    <a href="{{ $post->url() }}">{{ $post->name }}</a>
                                </h4>
                                <p class="date-time">Đăng vào ngày: <span>{{ $post->date_format }}</span></p>
                            </div>
                            <div class="excerpt-post nowrap-3">
                                <p>{{ $post->excerpt() }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="box">
                    <div class="box-title">
                        <h2><a href="{{ $catemain3->url() }}">{{ $catemain3->name }}</a></h2>
                        <a href="{{ $catemain3->url() }}">Xem thêm <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                    <style>
                        ins {
                            text-decoration: none;
                            font-size: 20px;
                            color: red;
                            font-weight: 700;
                        }
                        del {
                            font-size: 13px;
                            color: #858584;
                            margin-left: 5px;
                        }
                        .az-sale-label {
                            z-index: 1;
                            width: 40px;
                            height: 20px;
                            text-align: center;
                            line-height: 20px;
                            background-color: red;
                            color: white;
                            display: block;
                            font-size: 12px;
                            margin-bottom: 15px;
                            position: absolute;
                            border-radius: 4px;
                        }
                        .checked {
                            color: orange;
                        }
                    </style>
                    @foreach($main3 as $key => $post)
                    <div class="row pb-30">
                        <div class="col-md-6">
                            <div class="ft-img-post">
                                <a href="{{ $post->url() }}">
                                    <img width="400" height="250" src="{{ $post->thumbnail() }}" class="attachment-medium size-medium wp-post-image" alt="{{ $post->name }}" loading="lazy" sizes="(max-width: 400px) 100vw, 400px" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="title-post pb-10">
                                <h2 class="nowrap-2">
                                    <a href="{{ $post->url() }}">{{ $post->name }}</a>
                                </h2>
                                <p class="date-time">Đăng vào ngày: <span>{{ $post->date_format }}</span></p>
                            </div>
                            <div class="excerpt-post nowrap-3">
                                {{ $post->excerpt() }}
                            </div>
                            <div class="btn-load-more pt-30">
                                <a href="{{ $post->url() }}">Xem Thêm</a>
                            </div>
                        </div>
                    </div>
                    <!-- end box -->
                    @endforeach
                </div>

                <div class="box box-gird">
                    <div class="box-title">
                        <h2><a href="{{ $catemain4->url() }}">{{ $catemain4->name }}</a></h2>
                        <a href="{{ $catemain4->url() }}">Xem thêm <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="row">
                        @foreach($main4 as $key => $post)
                        <div class="col-md-6">
                            <div class="ft-img-post">
                                <a href="{{ $post->url() }}">
                                    <img width="400" height="250" src="{{ $post->thumbnail() }}" class="attachment-medium size-medium wp-post-image" alt="{{ $post->name }}" loading="lazy" sizes="(max-width: 400px) 100vw, 400px" />
                                </a>
                            </div>
                            <div class="title-post pb-10">
                                <h4 class="nowrap-2">
                                    <a href="{{ $post->url() }}">{{ $post->name }}</a>
                                </h4>
                                <p class="date-time">Đăng vào ngày: <span>{{ $post->date_format }}</span></p>
                            </div>
                            <div class="excerpt-post nowrap-3">
                                <p>{{ $post->excerpt() }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @include('public.post.sidebar-right',['col'=>3])
        </div>
    </div>
    <!--container-->
</div>
@endsection
