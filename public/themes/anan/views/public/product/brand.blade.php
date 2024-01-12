@extends('public.layout')
@section('title', $brand->meta->meta_title ?: $brand->name)
@section('body_class', 'archive tax-thuong-hieu term-ebitcam term-10549 theme-vuhoangtelecom woocommerce
woocommerce-page woocommerce-no-js')

@push('styles')

@endpush

@section('content')

<div class="az-breadcrumb-woo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="woocommerce-breadcrumb" itemprop="breadcrumb"><a href="{{ route('home') }}">Trang
                        chủ</a><span> &raquo; </span>Thương hiệu<span> &raquo; </span>{{ $brand->name }}</nav>
            </div>
        </div>
    </div>
</div>
<div class="az-wp ">
    <div class="container">
        <div class="title-tabs mb-30">
            @if ($brand->description)
            <h2 class="mb-20">Thông tin hãng sản xuất</h2>
            <div class="content-tabs" style="border-left: 5px solid #eb1c24; padding : 10px;">
                {!! $brand->description !!}
            </div>
            @endif
        </div>
        <div class="row az-home-row-product az-section">
            <div class="col-md-12 az-content px-md-0">
                <h1 class="d-none">{{ $brand->name }}</h1>
                @foreach ($products as $item)
                    @include('public.product.partials.item')
                @endforeach
            </div>
            <div class="navigation-product pt-20 text-center 1">
            </div>
           <div class="col-md-12 az-content px-md-0 d-flex justify-content-center">
                <div class="navigation pt-20 text-center">
                {!! $products->links('public.product.paginate.search_result_custom') !!}
            	</div>
            </div>
        </div>
    </div>
    <!--container-->
</div>

@endsection

@push('scripts')

@endpush
