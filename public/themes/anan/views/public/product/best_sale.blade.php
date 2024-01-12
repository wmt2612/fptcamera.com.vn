@extends('public.layout')
@section('title', 'Sản phẩm mua nhiều')
@section('body_class', 'page-template page-template-templates page-template-temp-most-viewed-products
page-template-templatestemp-most-viewed-products-php page page-id-643 theme-vuhoangtelecom woocommerce-no-js')


@section('content')

<div class="az-breadcrumb-woo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="woocommerce-breadcrumb" itemprop="breadcrumb">
                    <a href="{{ route('home') }}">Trang chủ</a><span>
                        » </span>Sản phẩm xem nhiều</nav>
            </div>
        </div>
    </div>
</div>
<div class="az-wp">
    <div class="container">
        <style>
            .az-title {
                position: relative;
                padding: 2%;
                margin: 0px;
            }

            .az-title:before {
                content: "";
                position: absolute;
                background-image: url("{{ Theme::url('assets/images/iconsale.png') }}");
                left: 30px;
                top: 50%;
                transform: translateY(-50%);
                width: 35px;
                height: 35px;
            }

            .az-title.onsale {
                vertical-align: middle;
            }

            .az-title.onsale h1 {
                font-family: Arial, Helvetica, sans-serif;
                padding-left: 50px !important;
                font-size: 18px;
                color: red;
            }
        </style>
        <div class="az-fs-banner">
            <img class="w-100" src="{{ Theme::url('assets/images/2020/11/BANNER-CAMERA-WIFI-GIA-SOC-TRANG-CHU-1220-x-340.jpg') }}"
                alt="Vuhoangtelecom">
        </div>
        <div class="row az-home-row-product az-section mt-30">
            <div class="row az-title onsale">
                <div class="col-md-12">
                    <h1>SẢN PHẨM MUA NHIỀU</h1>
                    <p style="margin-left: 50px;">Tổng hợp tất cả các sản phẩm chất lượng, được quan tâm và đặt mua
                        nhiều
                        nhất tại FPT Camera </p>
                </div>
            </div>
            <div class="col-md-12 az-content px-md-0">
                @foreach ($products as $item)
                    @include('public.product.partials.item')
                @endforeach
            </div>
            <div class="navigation-product pt-20 text-center">
                <a href="#" id="loadMore"> Xem thêm <i class="fa fa-angle-right" aria-hidden="true"></i></a>
            </div>
        </div>
        <script type="text/javascript">
            window.addEventListener('DOMContentLoaded', function () {
             jQuery(document).ready(function ($) {
                $('.az-product-item').css('display', 'none');
                $('.az-product-item').slice(0, 10).show();

                $("#loadMore").on('click', function (e) {
                   e.preventDefault();
                   Load_more_product();

                });

                function Load_more_product() {
                   $(".az-product-item:hidden").slice(0, 5).slideDown();
                   if ($(".az-product-item:hidden").length == 0) {
                      $("#load").fadeOut('slow');
                   }
                   /*$('html,body').animate({
                       scrollTop: $("#loadMore").offset().top - 70
                   }, 1200);*/
                }


             })
          });
        </script>
    </div>
    <!--container-->
</div>
@endsection
