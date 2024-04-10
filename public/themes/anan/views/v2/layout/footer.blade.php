<footer class="az-footer">
    <div class="container">
        <div class="row az-ft-contact">
            <div class="col-lg-6">
                <div class="ft-left">
                    <div class="title">
                        <h4>ĐĂNG KÝ NHẬN TIN KHUYẾN MÃI HOT MỖI NGÀY</h4>
                    </div>
                    <div class="subtitle">
                        <span>Đừng bỏ lỡ hàng ngàn sản phẩm từ chương trình siêu hấp dẫn</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ft-right">
                    <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-222" method="post" data-id="222"
                          data-name="Form footer">
                        <div class="mc4wp-form-fields">
                            <input type="email" class="input-email" name="EMAIL" placeholder="Địa chỉ email của bạn"
                                   required="">
                            <input type="submit" class="input-submit" value="Đăng ký">
                        </div>
                        <div class="mc4wp-response"></div>
                    </form>
                    <!-- / Mailchimp for WordPress Plugin -->
                </div>
            </div>
        </div>
    </div>

    <div class="bg-ft-box d-md-none d-xl-block">
        <div class="container">
            <div class="row az-ft-box">
                @for ($i = 1; $i < 4; $i++)
                    <div class="col-md-4">
                        <div class="box box-content-{{$i}}">
                            <div class="title">
                                <h4>{{ setting('anan_footer_section_one_title_'.$i) }}</h4>
                            </div>
                            <div class="subtitle">
                            <span>
                                {{ setting('anan_footer_section_one_subtitle_'.$i) }}
                            </span>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <div class="bg-ft-link">
        <div class="container">
            <div class="row az-ft-link ft-link-row-1">
                @for ($i = 1; $i < 6; $i++)
                    {!! setting('anan_footer_section_two_'.$i) !!}
                @endfor
            </div>
            <!-- pc -->
            <!-- <div class="d-none d-sm-block"> -->
            <div class="row az-ft-link ft-link-row-2">
                @for ($i = 1; $i < 5; $i++)
                    {!! setting('anan_footer_section_three_'.$i) !!}
                @endfor
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row az-ft-copyright">
            <div class="col-md-5">
                <div class="ft-img-note text-right">
                    <ul class="list-img-note fll-footer-mb">
                        <li><a href="http://online.gov.vn/Home/WebDetails/113245" target="_blank" rel="nofollow"><img
                                        src="{{ Theme::url('assets/images/thongbao.png ') }}" alt="fptcamera"></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-7">
                <div class="content text-left">
                    <span>
                        {{ setting('anan_footer_section_four_giayphep') }}
                    </span>
                </div>
            </div>
        </div>
    </div>

</footer>
<div class="button_scrool">
    <button id="scroll_bt"><i class="fas fa-angle-up"></i></button>
    <div class="bt_zalo pulse-blue ">
        <a href="{{ setting('contact_zalo') }}"><img src="{{ v(Theme::url("assets/v2/images/Icon_of_Zalo.svg.png")) }}" alt="zalo"></a>
    </div>
    <div class="bt_fb pulse-blue ">
        <a href="{{ setting('contact_messenger') }}"><img src="{{ v(Theme::url("assets/v2/images/meessage.png")) }}" alt="zalo"></a>
    </div>
</div>
<div class="hotline-phone-ring-wrap">
    <div class="hotline-phone-ring">
        <div class="hotline-phone-ring-circle"></div>
        <div class="hotline-phone-ring-circle-fill"></div>
        <div class="hotline-phone-ring-img-circle">
            <a href="tel:{{ setting('contact_phone') }}" class="pps-btn-img">
                <img src="{{ v(Theme::url('assets/v2/images/icon-phone.png')) }}" alt="Gọi điện" width="20px" height="20px">
            </a>
        </div>
    </div>
    <div class="hotline-bar">
        <a href="tel:0855116555">
            <span class="text-hotline">{{ setting('contact_phone') }}</span>
        </a>
    </div>
</div>
<div class="menu_mobile">
    <ul>
        <li>
            <a href="/">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="open_tab-menu">
            <a class="open-menu-mobile">
                <i class="fas fa-bars"></i>
                <span>Danh mục</span>
            </a>
        </li>
        <li>
            <a href="/san-pham-mua-nhieu">
                <i class="fas fa-store"></i>
                <span>Cửa hàng</span>
            </a>
        </li>
        <li>
            <a href="{{ route('blog.index') }}">
                <i class="far fa-newspaper"></i>
                <span>Tin tức</span>
            </a>
        </li>
        <li>
            <a href="/san-pham-khuyen-mai">
                <i class="far fa-eye"></i>
                <span>Khuyến mãi</span>
            </a>
        </li>
    </ul>
    <div class="category_mb">
        <ul class="nav nav-tabs bg_tab" id="myTab" role="tablist">
            @foreach($vmenu->vMenus(7) as $key => $item)
                <li class="nav-item camera" role="presentation">
                    <button class="nav-link @if($key == 0) active @endif" id="{{ $item->slug() }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $item->slug() }}" type="button" role="tab" aria-controls="{{ $item->slug() }}" aria-selected="true">
                        <div class="box">
                            <img src="{{ $item->backgroundImage() ?? v(Theme::url("assets/v2/images/icon-camera.webp")) }}" alt="">
                            <p>{{ $item->name() }}</p>
                        </div>
                    </button>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="myTabContent">
            @foreach($vmenu->vMenus(7) as $key => $item)
                <div class="tab-pane fade @if($key == 0) show active @endif" id="{{ $item->slug() }}" role="tabpanel" aria-labelledby="{{ $item->slug() }}-tab">
                    <div class="box_sub-menu">
                        <ul>
                            <li>
{{--                                <div class="title">--}}
{{--                                    <h2>Camera</h2>--}}
{{--                                    <a href="#">Xem tất cả</a>--}}
{{--                                </div>--}}
                                @foreach($item->subMenus() as $subMenu)
                                    <div class="box_item">
                                        <div class="full-width d-flex justify-content-between align-items-center" style="width: 100%">
                                            <b style="font-size: 12px; font-weight: 700; padding: 10px 0">{{ $subMenu->name() }}</b>
                                            <a href="{{ $subMenu->url() }}" style="font-size: 12px" class="text-black">Xem tất cả</a>
                                        </div>
                                        <div class="box">
                                            @foreach($subMenu->items() as $subMenuItem)
                                                <a href="{{ $subMenuItem->url() }}">{{ $subMenuItem->name() }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="body-overlay"></div>