@extends('public.layout')
@section('title', 'Blog')
@section('body_class', 'blog theme-vuhoangtelecom woocommerce-no-js')
@push('styles')
<link rel="stylesheet" href="{{ Theme::url('assets/js/ckeditor/plugins/toc/styles/styles.css') }}">
<style>
    .widget-toc {
        padding: 10px;
        width: 100%;
    }

    html {
        scroll-behavior: smooth;
    }

    .show-toc-toggle-btn {
        font-size: 15px;
        color: blue;
        font-weight: bold;
        cursor: pointer;
    }

    .post-author {
        background-color: #ddeaf3b0 !important;
        margin-top: 2rem !important;
        padding: 20px 15px;
    }

    .post-author-title {
        font-size: 18px;
        font-weight: 600;
        text-decoration: underline;
    }

    .post-author-content {
        display: flex;
        column-gap: 25px;
    }

    .post-author .author-avatar-box {
        display: flex;
        justify-content: center;
    }

    .post-author .author-avatar {
        position: relative;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
    }

    .post-author .author-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .post-author .author-name {
        font-size: 19px;
        font-weight: 500;
        margin-bottom: 10px;
    }

    .post-author .author-description {
        text-align: justify;
    }

    @media (max-width: 768px) {
        .post-author-content {
           flex-direction: column;
        }

        .post-author .author-name {
           text-align: center;
            margin-top: 12px;
        }


    }
</style>
@endpush
@section('content')
<div class="az-breadcrumb-woo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="woocommerce-breadcrumb" itemprop="breadcrumb">
                    <a href="/">Trang chủ</a>
                    <span> &raquo; </span>{{ $post->name }}
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="az-wp">
    <div class="container">
        <div class="row pb-30">
            @php
                $author = $post->author;
            @endphp
            <div class="col-lg-9 content-blog">
                <div class="row pb-15" style="background-color: #fff">
                    <div class="col-md-12">
                        <div class="title-post pb-10 pt-20">
                            <h1 class="single-post">{{ $post->name }}</h1>
                            <p class="date-time">
                                @if($author)
                                    <span>{{ $author->full_name }} | </span>
                                @endif
                                Đăng vào ngày: <span>{!! $post->date_format !!}</span>
                            </p>
                        </div>
                        <div id="post-toc">

                        </div>
                        <div class="content-post pt-15">
                            {!! \Modules\AutoLink\Helpers\RenderAutoLink::handle(
                                $post->content,
                                \Modules\AutoLink\Entities\AutoLink::RENDER_FOR_POST) !!}
                        </div>

                    </div>
                </div>

                @include('public.post.author')
            </div>

            @include('public.post.sidebar-right',['col'=>3])
        </div>
    </div>
    <!--container-->
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        function removeAccents(str) {
            var AccentsMap = [
                "aàảãáạăằẳẵắặâầẩẫấậ",
                "AÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬ",
                "dđ", "DĐ",
                "eèẻẽéẹêềểễếệ",
                "EÈẺẼÉẸÊỀỂỄẾỆ",
                "iìỉĩíị",
                "IÌỈĨÍỊ",
                "oòỏõóọôồổỗốộơờởỡớợ",
                "OÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢ",
                "uùủũúụưừửữứự",
                "UÙỦŨÚỤƯỪỬỮỨỰ",
                "yỳỷỹýỵ",
                "YỲỶỸÝỴ"    
            ];
            for (var i=0; i<AccentsMap.length; i++) {
                var re = new RegExp('[' + AccentsMap[i].substr(1) + ']', 'g');
                var char = AccentsMap[i][0];
                str = str.replace(re, char);
            }
            return str;
        }

        $('.widget-toc li a').each(function(index, elm) {
            const anchorId = $(this).attr('href');
            // $(`${anchorId}`).attr('id', removeAccents(anchorId.replace('#', '')));
            // $('#Đối+tác+chiến+lược+phát+triển+cùng+FPTC+luôn+được+lựa+chọn+tin+cậy').attr('id', '12d');
            $(this).attr('href', `{{ Request::url() }}${anchorId }`)
        })
      
        $('#toc-header').append(`
            <span class="show-toc-toggle-btn">[ Ẩn ]</span>
        `);

        $(document).on('click', '.show-toc-toggle-btn', function(){ 
            if($('.widget-toc ol').is(':visible')) {
                $('.widget-toc ol').hide('smooth');
                $('.show-toc-toggle-btn').text('[ Hiện ]');
            } else {
                $('.widget-toc ol').show('smooth');
                $('.show-toc-toggle-btn').text('[ Ẩn ]');
            }
            $('.widget-toc').css('width', '100%');
        }); 
    })
</script>
@endpush