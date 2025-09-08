@extends('v2.layout.master')

@section('content')
    <div class="d-none">
        <h1>{{ setting('store_name') }}</h1>
    </div>

    {{-- Banner chính --}}
    <section class="banner_main">
        <div class="container">
            <div class="row banner">
                <div class="category"></div>
                <div class="banner_slide custem_slider">
                    <ul>
                        @foreach ($slider->slides as $slide)
                            <li>
                                <a href="{{ $slide->call_to_action_url }}">
                                    <img src="{{ $slide->file->path }}"
                                         alt="{{ $slide->caption_1 ?? 'banner slide' }}"
                                         loading="lazy">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="banner_right">
                    <ul>
                        @foreach ($sliderbanners->slides as $slide)
                            <li>
                                <a href="{{ $slide->call_to_action_url }}">
                                    <img src="{{ $slide->file->path }}"
                                         alt="{{ $slide->caption_1 ?? 'banner slide right' }}"
                                         loading="lazy">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Danh mục trang chủ --}}
    <section class="accessory custem_slider">
        <div class="container">
            <div class="title home_title">
                <h2><span class="title-main">{{ $homecate->root()->name }}</span></h2>
            </div>
            <div class="row accessory_slider">
                @foreach ($homecate->menus() as $menu)
                    <div class="col-lg-2 col-md-3 col-4">
                        <div class="box">
                            <div class="title">
                                <a href="{{ $menu->url() }}">
                                    <div class="img bg_category">
                                        <img src="{{ $menu->backgroundImage() }}"
                                             alt="{{ $menu->name() }}"
                                             loading="lazy">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Banner nhỏ --}}
    <section>
        <div class="container">
            <div class="row">
                <div class="banner_bottom">
                    <a href="{{ $homebanner01_url }}">
                        <img src="{{ $homebanner01 }}" alt="banner1" loading="lazy">
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Flash Sale --}}
    @if($flashSaleSection->status)
        <section class="flas_sale custem_slider">
            <div class="container">
                <div class="row pd_12">
                    <div class="bg_linear">
                        <div class="flas_sale-top">
                            <div class="title">
                                <h2>F
                                    <img src="{{ v(Theme::url("assets/v2/images/flas.svg")) }}"
                                         alt="flash sale"
                                         loading="lazy">
                                    ash sale
                                </h2>
                            </div>
                        </div>
                        <div class="row bg_flas flas_slide product_slider">
                            @foreach($flashSaleSection->products as $product)
                                @include('v2.product.single_v2', ['product' => $product])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Deal Section --}}
    {!! Cache::remember('home_deal_section', 86400, function () use ($dealSection) {
        return view('v2.partials.home.section', ['section' => $dealSection])->render();
    }) !!}

    {{-- Just For You --}}
    {!! Cache::remember('home_j4u_section', 86400, function () use ($j4uSection) {
        return view('v2.partials.home.section', ['section' => $j4uSection])->render();
    }) !!}

    {{-- Banner nhỏ --}}
    <section>
        <div class="container">
            <div class="row">
                <div class="banner_bottom">
                    <a href="{{ $homebanner02_url }}">
                        <img src="{{ $homebanner02 }}" alt="banner2" loading="lazy">
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Newest Products --}}
    {!! Cache::remember('home_newest_section', 86400, function () use ($newestProductSection) {
        return view('v2.partials.home.section', ['section' => $newestProductSection])->render();
    }) !!}

    {{-- Custom Sections --}}
    @foreach($customSections as $index => $customSection)
        {!! Cache::remember("home_custom_section_{$index}", 86400, function () use ($customSection) {
            return view('v2.partials.home.section', ['section' => $customSection])->render();
        }) !!}
    @endforeach

    {{-- Deal Banners --}}
    <section class="special_offer custem_slider">
        <div class="container">
            <div class="title home_title">
                <h2><span class="title-main">{{ setting('home_deal_banners_title') }}</span></h2>
            </div>
            <div class="row">
                @foreach ($dealBanners->slides as $slide)
                    <div class="col-lg-3 col-md-3 col-12 mb-4">
                        <a href="{{ $slide->call_to_action_url }}">
                            <div class="img">
                                <img src="{{ $slide->file->path }}"
                                     alt="{{ $slide->caption_1 ?? 'slide banner' }}"
                                     loading="lazy">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Tin mới --}}
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
                @foreach($latest_posts as $post)
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="box">
                            <div class="img">
                                <img src="{{ $post->thumbnail() }}"
                                     alt="{{ $post->name }}"
                                     loading="lazy">
                            </div>
                            <div class="content">
                                <div class="title">
                                    <h4><a href="{{ $post->url() }}">{{ $post->name }}</a></h4>
                                </div>
                                <div class="text">
                                    <p>{{ $post->excerpt() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
