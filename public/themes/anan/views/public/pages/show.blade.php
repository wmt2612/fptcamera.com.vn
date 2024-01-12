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
                	<span> &raquo; </span>{{ $page->name }}
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="az-wp">
    <div class="container">
        <div class="row pb-30">
            <div class="col-lg-12 content-blog">
                <div class="row pb-15" style="background-color: #fff">
                    <div class="col-md-12">
                        <div class="title-post pb-10 pt-20">
                            <h1 class="single-post">{{ $page->name }}</h1>
                            <p class="date-time">Đăng vào ngày: <span>{!! $page->date_format !!}</span></p>
                        </div>
                        <div class="content-post pt-15">
                            {!! $page->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--container-->
</div>
@endsection
