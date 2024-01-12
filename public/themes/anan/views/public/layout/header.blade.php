<div class="az-topbar d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-md-12 az-col-topbar">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse">
                        <ul class="navbar-nav mr-auto az-nav-phone">
                            @foreach ($leftSideTopMenu->menus() as $menuItem)
                            <li class="nav-item nav-item-top-side-menu">
                                <i class="{{ $menuItem->icon() }}"></i>
                                <a class="nav-link" href="{{ $menuItem->url() }}">{{ $menuItem->name() }}</a>
                            </li>
                            @endforeach
                        </ul>
                        <ul class="navbar-nav az-nav-support">
                            @foreach ($rightSideTopMenu->menus() as $menuItem)

                            <li class="nav-item az-nav-item-download nav-item-top-side-menu">
                                <i class="{{ $menuItem->icon() }}"></i>
                                <a class="nav-link 
                                    @if($menuItem->hasSubMenus() || $menuItem->expandDesc()) dropdown-toggle @endif" 
                                    href="{{ $menuItem->url() }}" 
                                    id="{{ $menuItem->id() }}" 
                                    data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false"
                                >
                                    <span class="topbar-icon"></span>{{ $menuItem->name() }}</a>
                                @if($menuItem->expandDesc())
                                <div class="dropdown-menu" style="min-width: 470px" aria-labelledby="{{ $menuItem->id() }}">
                                    {!! $menuItem->expandDesc() !!}
                                </div>
                                @elseif($menuItem->hasSubMenus())
                                <div class="dropdown-menu" aria-labelledby="{{ $menuItem->id() }}">
                                    <ul class="list-link-download">
                                        @foreach ($menuItem->subMenus() as $subMenu)
                                        <li class="nav-item-top-side-menu" style="justify-content: left;">
                                            <i class="{{ $subMenu->icon() }}"></i>
                                            <a href="{{ $subMenu->url() }}" target="{{ $subMenu->target() }}"
                                                rel="nofollow">{{
                                                $subMenu->name() }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
<header class="az-header d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="logo">
                    <a href="/">
                        <img style="width: 100%; height: auto" src="{{ $header_logo }}" alt="anantelecom">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="search-form text-center">
                    <form class="form-search widget-search-form" action="{{ route('home') }}" method="get"
                        autocomplete="off">
                        <input type="text" name="s" class="input-search search-ajax" placeholder="Bạn cần tìm...">
                        <button class="btn-search" type="submit" title="Start Search"
                            value="{{ request()->get('s') ?? '' }}">
                            <i class="fa fa-search" aria-hidden="true"></i> <span>Tìm kiếm</span>
                        </button>
                    </form>
                    <div id="load-data"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-header-right">
                        <li class="login">
                            <div class="title">
                                <a href="#" title="Đăng nhập">Tài Khoản</a>
                            </div>
                        </li>
                        <li class="cart">
                            <div class="title ">
                                <a class="cart-customlocation" href="{{ route('cart.index') }}">Giỏ hàng</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-10 list-keyword" style="padding-left: 35px; height: 0px;">
                <ul>
                </ul>
            </div>
            <!-- End col-md-10 list-keywword -->
        </div>
        <!-- End row -->
    </div>
</header>
<div class="topbar-bottom d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="topbar-bottom-left" id="">
                    <a href="#"><i class="fa fa-bars" aria-hidden="true"></i> DANH MỤC SẢN PHẨM</a>
                    <div id="stick_menu_pc" class="az-page az-megamenu">
                        <ul id="menu-menu-danh-muc-san-pham" class="menu">
                            @foreach($vmenu->vMenus(7) as $item)
                            <li id="menu-item-53995"
                                class="az-megamenu-item menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-53995">
                                <a href="{{ $item->url() }}">{{ $item->name() }}</a>
                                @if ($item->subMenus()->isNotEmpty())
                                <ul class="sub-menu">
                                    @foreach ($item->subMenus() as $subMenu)
                                    <li id="menu-item-72577"
                                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-72577">
                                        <a href="{{ $subMenu->url() }}">{{ $subMenu->name() }}</a>
                                        @if ($subMenu->items()->isNotEmpty())
                                        <ul class="sub-menu">
                                            @foreach ($subMenu->items() as $itemMenu)
                                            <li id="menu-item-72577"
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-72577">
                                                <a href="{{ $itemMenu->url() }}">{{ $itemMenu->name() }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-9 px-md-0">
                <div class="topbar-bottom-right text-right">
                    <ul class="topbar-bottom-list">
                        @foreach ($primaryMenu->vMenus(1) as $menu)
                        <li class="list-3"><a href="{{ $menu->url() }}">{{ $menu->name() }}</a></li>
                        @endforeach
                        {{-- <li class="list-1"><a href="{{ route('product.index') }}">Sản phẩm được quan tâm</a></li>
                        <li class="list-2">
                            <h2 style="font-size: 13px;margin-bottom: 0"><a href="{{ route('blog.index') }}">Khuyến
                                    mãi</a></h2>
                        </li>
                        <li class="list-4"><a href="#">7 ngày đổi trả</a></li>
                        <li class="list-5"><a href="#">Tin Công Nghệ</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END DESKTOP -->
<!-- MOBILE -->
<header class="az-menu-mobile d-block d-sm-block d-lg-none">
    <nav class="az-nav-menu">
        <div class="container-fluid">
            <div class="az-navbar-header">
                <button type="button" class="az-sidenav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="search-form-mobile">
                    <div class="input-group md-form form-sm form-2 pl-0">
                        <form class="az-search-form-header-mobile" action="#" method="get" autocomplete="off">
                            <input class="form-control red-border search-ajax-mobile" type="text" name="s"
                                placeholder="Bạn cần tìm..." aria-label="Search">
                            <div class="input-group-append">
                                <button class="az-btn-search" type="submit" title="Start Search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form>
                        <div id="load-data-mobile"></div>
                    </div>
                </div>
                <a class="az-navbar-brand" href="/">
                    <img src="{{ $mobile_header_logo }}" alt="anantelecom">
                </a>
            </div>
            <div id="az-sidenav-menu" class="">
                <button class="btn-close"><i class="fa fa-times" aria-hidden="true"></i></button>
                <ul class="nav navbar-nav">
                    <li class="search-menu">
                        <div class="search-form-sidenav-mobile">
                            <div class="input-group md-form form-sm form-2 pl-0">
                                <form class="az-search-form-header-mobile" action="#" method="get" autocomplete="off">
                                    <input class="form-control my-0 py-1 red-border" type="text" name="s"
                                        placeholder="Bạn cần tìm..." aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="az-btn-search az-btn-search-sidenav" type="submit"
                                            title="Start Search">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </li>
                    <li class="homepage">
                        <a href="/">Trang chủ</a>
                    </li>
                    <li class="title-menu menu-item-has-children border-group-menu">
                        <a href="#">Danh mục sản phẩm</a>
                        <ul class="sub-menu">
                            <li class="back-to-parent">
                                <a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i>
                                    Quay về
                                </a>
                            </li>
                            @foreach($vmenu->menus() as $item)
                            <li
                                class="az-megamenu-item menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-53995">
                                <a href="{{ $item->url() }}">{{ $item->name() }}</a>

                                @if ($item->subMenus()->isNotEmpty())
                                <ul class="sub-menu">
                                    @foreach ($item->subMenus() as $subMenu)
                                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-72577">
                                        <a href="{{ $subMenu->url() }}">{{ $subMenu->name() }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </li>
                   <li class="menu-item-customize">
                        <a href="{{ route('blog.index') }}">Tin tức</a>
                    </li>
                    <li id="menu-item-681"
                        class="account menu-item menu-item-type-post_type menu-item-object-page menu-item-681">
                        <a href="#">Tài khoản</a>
                    </li>
                    <li id="menu-item-377"
                        class="cart border-group-menu menu-item menu-item-type-post_type menu-item-object-page menu-item-377">
                        <a href="{{ route('cart.index') }}">Giỏ hàng của bạn</a>
                    </li>
                    <li id="menu-item-381"
                        class="research menu-item menu-item-type-custom menu-item-object-custom menu-item-381">
                        <a href="#">Tra cứu bảo hành</a>
                    </li>
            </div>
        </div>
    </nav>
</header>
<!-- END MOBILE -->