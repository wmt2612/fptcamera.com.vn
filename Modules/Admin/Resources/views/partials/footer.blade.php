{{-- <section class="partner">
    <div class="container">
        <div class="partner__box">
            <div class="partner__slider">
                <div class="partner__item">
                    <div class="item">
                        <a href="#"><img src="{{ Theme::url('assets/img/doitac/br1.jpg') }}" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ Theme::url('assets/img/doitac/br1.jpg') }}" alt=""></a>
                    </div>
                </div>
                <div class="partner__item">
                    <div class="item">
                       <a href="#"> <img src="{{ Theme::url('assets/img/doitac/br1.jpg') }}" alt=""></a>
                    </div>
                    <div class="item">
                       <a href="#"> <img src="{{ Theme::url('assets/img/doitac/br2.jpg') }}" alt=""></a>
                    </div>
                </div>
                <div class="partner__item">
                    <div class="item">
                       <a href="#"> <img src="{{ Theme::url('assets/img/doitac/br3.jpg') }}" alt=""></a>
                    </div>
                    <div class="item">
                       <a href="#"> <img src="{{ Theme::url('assets/img/doitac/br4.jpg') }}" alt=""> </a>
                    </div>
                </div>
                <div class="partner__item">
                    <div class="item">
                       <a href="#"> <img src="{{ Theme::url('assets/img/doitac/br5.jpg') }}" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ Theme::url('assets/img/doitac/br6.jpg') }}" alt=""> </a>
                    </div>
                </div>
                <div class="partner__item">
                    <div class="item">
                       <a href="#"> <img src="{{ Theme::url('assets/img/doitac/br7.jpg') }}" alt=""> </a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ Theme::url('assets/img/doitac/br8.jpg') }}" alt=""></a>
                    </div>
                </div>
                <div class="partner__item">
                    <div class="item">
                        <a href="#"><img src="{{ Theme::url('assets/img/doitac/br1.jpg') }}" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ Theme::url('assets/img/doitac/br1.jpg') }}" alt=""></a>
                    </div>
                </div>
                <div class="partner__item">
                    <div class="item">
                        <a href="#"><img src="{{ Theme::url('assets/img/doitac/br1.jpg') }}" alt=""></a>
                    </div>
                    <div class="item">
                        <a href="#"><img src="{{ Theme::url('assets/img/doitac/br1.jpg') }}" alt=""></a>
                    </div>
                </div>
                <div class="partner__item">
                    <div class="item">
                        <a href="#"><img src="{{ Theme::url('assets/img/doitac/br1.jpg') }}" alt=""></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="menu__footer">
    <div class="container">
        <div class="row menu__footer-box">
            <div class="menu__footer-box-item">
                <h4>{{ $getMenus::find($settings['ctluxhome_footer_menu_one'])->name }}</h4>
                <ul>
                    @foreach ($getMenus::find($settings['ctluxhome_footer_menu_one'])->menuItems as $item)
                        <li><a href="{{ $item->url }}">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="menu__footer-box-item">
                <h4>{{ $getMenus::find($settings['ctluxhome_footer_menu_two'])->name }}</h4>
                <ul>
                    @foreach ($getMenus::find($settings['ctluxhome_footer_menu_two'])->menuItems as $item)
                        <li><a href="{{ $item->url }}">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="menu__footer-box-item">
                <h4>{{ $getMenus::find($settings['ctluxhome_footer_menu_three'])->name }}</h4>
                <ul>
                    @foreach ($getMenus::find($settings['ctluxhome_footer_menu_three'])->menuItems as $item)
                        <li><a href="{{ $item->url }}">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="menu__footer-box-item">
                <h4>{{ $getMenus::find($settings['ctluxhome_footer_menu_four'])->name }}</h4>
                <ul>
                    @foreach ($getMenus::find($settings['ctluxhome_footer_menu_four'])->menuItems as $item)
                        <li><a href="{{ $item->url }}">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="menu__footer-box-item">
                <h4>{{ $getMenus::find($settings['ctluxhome_footer_menu_five'])->name }}</h4>
                <ul>
                    @foreach ($getMenus::find($settings['ctluxhome_footer_menu_five'])->menuItems as $item)
                        <li><a href="{{ $item->url }}">{{ $item->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="footer">
    <div class="container">
        <div class="footer__box">
            <div class="row footer__content">
                <div class="collum-4 footer__left">
                    <div class="footer__left-logo">
                        <img src="{{$getMedia::find($settings['ctluxhome_header_logo'])->path}}" alt="">
                    </div>
                    <div class="footer__left-text">
                        <p>{{ $settings['ctluxhome_copyright_text'] }}</p>
                    </div>
                    <div class="footer__left-payment">
                        <img src="{{$getMedia::find($settings['ctluxhome_accepted_payment_methods_image'])->path}}" alt="">
                    </div>
                </div>
                <div class="collum-3 footer__center">
                    <div class="footer__center-icon">
                        <a href="{{ $settings['ctluxhome_facebook_link'] }}"><img src="{{ Theme::url('assets/img/icon/facebook.png') }}" alt=""></a>
                        <a href="{{ $settings['ctluxhome_youtube_link'] }}"><img src="{{ Theme::url('assets/img/icon/youtube.png') }}" alt=""></a>
                        <a href="{{ $settings['ctluxhome_twitter_link'] }}"><img src="{{ Theme::url('assets/img/icon/twitter.png') }}" alt=""></a>
                        <a href="{{ $settings['ctluxhome_instagram_link'] }}"><img src="{{ Theme::url('assets/img/icon/instagram.png') }}" alt=""></a>
                    </div>
                    <div class="footer__center-contact">
                        <h4>Need Help? Call Our Award-Wining</h4>
                        <span>Support customers 24/7, feel free to call: 11-222-3333</span>
                        <form action="{{ route('product.detail.advise') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="phone_advise" placeholder="Nhập số điện thoại">
                                <input type="submit" value="SUBSCRIBE">
                            </div>
                                @error('phone_advise')
                                <div style="width: 100%; margin-top:20px" class="alert alert-danger">{{ $message }}</p> </div>
                                @enderror
                                @error('success')
                                <div style="width: 100%; margin-top:20px" class="alert alert-success">{{ $message }}</p> </div>
                                @enderror
  
                            
                        </form>
                    </div>
                </div>
                <div class="collum-3 footer__right">
                    <div class="footer__right-top">
                        <h4>Service Center</h4>
                        <span>{{ $settings['asd_1323'] }}<br>
                            Tel: <a href="tel:{{ $settings['ctluxhome_phone'] }}">{{ $settings['ctluxhome_phone'] }}</a>
                             <br> E-mail: <a href="mailto:{{ $settings['ctluxhome_email'] }}">{{ $settings['ctluxhome_email'] }}</a></span>
                        <a href="#"> View on map</a>
                    </div>

                     
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <p class="text-center" style="color: #808080;">Copyright ©2021 by CTLuxHome | <a href="https://webmaster.com.vn/thiet-ke-website" style="color: #808080;">Thiết kế website</a> bởi <a href="https://webmaster.com.vn" style="color: #808080;">Webmaster Vietnam</a></p> 
    </div>
</section>
 
   
<nav id="menu" style="position: relative;">
    <ul id="panel-menu">
        <li><a href="#/">Home</a></li>
        <li><a href="#/work">Our work</a></li>
        <li><span>About us</span>
        <ul>
            <li><a href="#/about/history">History</a></li>
            <li><span>The team</span>
            <ul>
                <li><a href="#/about/team/management">Management</a></li>
                <li><a href="#/about/team/sales">Sales</a></li>
                <li><a href="#/about/team/development">Development</a></li>
            </ul>
            </li>
        </ul>
        </li>
        <li><span>Services</span>
        <ul>
            <li><a href="#/services/design">Design</a></li>
            <li><a href="#/services/development">Development</a></li>
            <li><a href="#/services/marketing">Marketing</a></li>
        </ul>
        </li>
        <li><a href="#/contact">Contact</a></li>
    </ul>
        <div id="cart">
            <p style="text-align: center; margin-top: 30px; color: #999;">Your shoppingcart is empty.</p>
        </div>
</nav> --}}
