@extends('public.layout')

@section('css')
<style>
    .btn.btn-mucluc {
        width: 100%;
        text-align: left;
        font-weight: bold;
        font-size: 1.2rem;
        color: #333;
        background: rgba(237, 237, 237, 0.95);
        border-radius: 0;
        border: 1px solid #333;
    }

    #toc ul,
    #toc ul li,
    #toc ul li a {
        display: block;
        width: 100%;
    }

    #toc>ul>li {
        padding-left: 10px;
    }

    .btn.btn-mucluc:focus,
    .btn.btn-mucluc:hover {
        box-shadow: none;
        outline: none;
    }

    .box-mucluc {
        display: none;
    }

    .box {
        padding: 20px;
        background-color: #f6f6f6;
        margin-bottom: 20px;
        word-wrap: break-word;
    }

    .box i {
        line-height: 60px;
        height: 60px;
        width: 60px;
        font-size: 60px;
        margin: 0;
        float: left;
        margin-left: -70px;
    }

    .box div.box-inner-block {
        padding-left: 70px;
        min-height: 50px;
    }

    /* Box shadow */
    .box.shadow {
        border: 1px solid #ddd;
        -webkit-box-shadow: 0 0 5px rgb(153 153 153 / 60%);
        -moz-box-shadow: 0 0 5px rgba(153, 153, 153, .6);
        box-shadow: 0 0 5px rgb(153 153 153 / 60%);
    }

    .box.shadow div.box-inner-block {
        padding: 0;
    }

    /* Box info */
    .box.info {
        background: #d6f6ff;
        border-color: #bfe3ec;
    }

    .box.info i {
        color: #2cb4da;
    }

    /* Box success */
    .box.success {
        background: #e2f2cb;
        border-color: #d1e4b7;
    }

    .box.success i {
        color: #8ab84d;
    }

    /* Box warning */
    .box.warning {
        background: #fffddb;
        border-color: #e9e59e;
    }

    .box.warning i {
        color: #ecc21b;
    }

    /* Box error */
    .box.error {
        background: #ffe6e2;
        border-color: #eebfb8;
    }

    .box.error i {
        color: #f03317;
    }

    /* Box download */
    .box.download {
        background: #e2f2cb;
        border-color: #d1e4b7;
    }

    .box.download i {
        color: #8ab84d;
    }

    /* Box note */
    .box.note {
        background: #fffddb;
        border-color: #e9e59e;
    }

    .box.note i {
        color: #ecc21b;
    }


    /* Shortcode button */
    a.shortc-button {
        border: none;
        cursor: pointer;
        padding: 0 10px;
        display: inline-block;
        margin: 10px 0 0;
        font-weight: 700;
        outline: none;
        position: relative;
        background: #bdc3c7;
        color: #fff !important;
        text-decoration: none;
        font-size: 10px;
        height: 25px;
        line-height: 25px;
        opacity: .9;
        overflow: hidden;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    a.shortc-button.medium {
        font-size: 14px;
        height: 45px;
        line-height: 45px;
        padding: 0 15px;
    }

    a.shortc-button.big {
        font-size: 24px;
        height: 65px;
        line-height: 65px;
        padding: 0 20px;
    }

    a.shortc-button.red {
        background: #e74c3c;
    }

    a.shortc-button.orange {
        background: #e67e22;
    }

    a.shortc-button.blue {
        background: #3498db;
    }

    a.shortc-button.green {
        background: #2ecc71;
    }

    a.shortc-button.black {
        background: #222;
    }

    a.shortc-button.white {
        background: #ecf0f1;
        color: #333 !important;
    }

    a.shortc-button.pink {
        background: #ff00a2;
    }

    a.shortc-button.purple {
        background: #9b59b6;
    }

    .content_post ul{
        list-style: disc;
        padding: 0;
        margin: 0;
        padding-left: 1rem
    }
    .content_post blockquote p{
        color: #999;
        padding: 0 18px;
        font-family: "Georgia";
        font-size: 18px;
        line-height: 28px;
        font-style: italic;
        border: 4px solid #777;
        border-width: 0 0 0 4px;
    }
</style>
@endsection
@section('content')

<section class="news news--1">
    <div class="container">
        <div class="row mt-20 mb-20">
            <div class="col-lg-12">
                <div class="block-title block__orange">
                    <h1>
                        {{ $title }}
                    </h1>
                </div>
                {{-- @if ($is_toc)
                <div class="row box-mucluc" style="margin-bottom: 30px;">
                    <div class="col-lg-6">
                        <button class="btn btn-mucluc" type="button" data-toggle="collapse"
                            data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-list-ol" aria-hidden="true"></i>
                            <span>Mục lục</span>
                        </button>
                        <div class="collapse" id="collapseExample">
                            <div id="toc">
                            </div>
                        </div>
                    </div>
                </div>
                @endif --}}
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="content_post">
                            {!! $data !!}
                        </div>
                    </div>
                    {{-- <div class="col-lg-12 col-md-12">
                        {!! '[contact-form-7][/contact-form-7]' !!}
                    </div> --}}
                </div>
            </div>

        </div>

    </div>
</section>

@endsection
