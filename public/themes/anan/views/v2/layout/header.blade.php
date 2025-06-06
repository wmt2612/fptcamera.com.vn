<header id="header" class="bg_primary">
    <div class="container">
        <div class="row">
            <div class="box_header">
                <div class="logo">
                    <a href="/">
                        <img style="width: 100%; height: auto" src="{{ $mobile_header_logo }}" alt="fptcamera">
                    </a>
                </div>
                <div class="flex_center">
                    <div class="box_category">
                        <div class="box">
                            <i class="fas fa-bars"></i>
                            <span>Danh Mục</span>
                        </div>
                        <div class="category">
                            <ul>
                                @foreach($vmenu->vMenus(7) as $item)
                                    <li class="category_item">
                                        <a href="{{ $item->url() }}" class="menu_drop">
                                            <div class="box">
                                                <img src="{{ $item->backgroundImage() ?? v(Theme::url('assets/v2/images/icon-camera.webp')) }}"
                                                     alt="{{ $item->name() }}">
                                                <p>{{ $item->name() }}</p>
                                            </div>
                                            <i class="fas fa-angle-right"></i>
                                        </a>
                                        <div class="sub-menu">
                                            <div class="row">
                                                @foreach ($item->subMenus() as $subMenu)
                                                    <div class="col-lg-3 col-md-6 border_r ">
                                                        <div class="menu_item">
                                                            <div class="title">
                                                                <a href="{{ $subMenu->url() }}">
                                                                    <h3>{{ $subMenu->name() }}</h3>
                                                                </a>
                                                            </div>
                                                            <ul>
                                                                @foreach($subMenu->items() as $itemMenu)
                                                                    <li>
                                                                        <a href="{{ $itemMenu->url() }}">{{ $itemMenu->name() }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="search">
                        <form action="/" method="GET">
                            <input name="s" class="input-search search-ajax" placeholder="Bạn Cần Tìm Gì?">
                            <button type="submit" class="btn-search"><i class="fas fa-search"></i></button>
                        </form>
                        <div id="load-data" class="load-data">
                        </div>
                    </div>

                </div>
                <div class="flex_right">
                    <ul class="new-top-menu">
                        @foreach($newTopMenu->menus() as $ntmItem)
                            <li class="phone">
                                <a href="{{ $ntmItem->url() }}">
                                    <img src="{{ $ntmItem->backgroundImage() }}" alt="{{ $ntmItem->name() }}">
                                    <p>{!! $ntmItem->name() !!}</p>
                                </a>
                            </li>
                        @endforeach
                        <li class="phone">
                            <a href="{{ route('cart.index') }}" style="position: relative">
                                <img src="{{ v(Theme::url('assets/v2/images/shopping-bag.png')) }}" alt="Giỏ hàng">
                                <p>Giỏ hàng</p>
                                @php
                                    $countCartItems = count(\Modules\Cart\Facades\Cart::items());
                                 @endphp
                                @if($countCartItems > 0)
                                    <div style="background: red; color: white; border-radius: 50%; overflow: hidden; position: absolute; padding: 2px 7px; left: 14px; top: -10px">
                                        {{ $countCartItems }}
                                    </div>
                                @endif
                            </a>
                        </li>
                    </ul>
                    <ul class="new-top-mobile-menu">
                        <li class="cart">
                            <a href="{{ route('cart.index') }}" style="position: relative">
                                <img src="{{ v(Theme::url('assets/v2/images/shopping-bag.png')) }}" alt="cart">
                                <p>Giỏ Hàng</p>
                                @if($countCartItems > 0)
                                    <div style="background: red; color: white; border-radius: 50%; overflow: hidden; position: absolute; padding: 2px 7px; left: 20px; top: -10px">
                                        {{ count(\Modules\Cart\Facades\Cart::items())  }}
                                    </div>
                                @endif
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</header>