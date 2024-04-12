<div class="col-lg-3 col-md-6 col-12 box">
    <div class="box_product">
        <div class="img">
            <a href="{{ $product->url() }}"><img src="{{ $product->thumbnail() }}" alt=""></a>
            <div class=" temp sphot ">
                <span>-{{ $product->price_percent_convert }}%</span>
            </div>
        </div>
        <div class="title">
            <h3>
                <a href="{{ $product->url() }}">{{ $product->name }}</a>
            </h3>
        </div>
        <div class="price-wrapper">
            <div class="price">
                @if($product->contact_for_price)
                    <p style="color: red">Giá liên hệ</p>
                @elseif ($product->hasSpecialPrice())
                    <p>{{ $product->selling_price->format() }}</p>
                    <span class="sale">{{ $product->price->format() }}</span>
                @else
                    <p>{{ $product->selling_price->format() }}</p>
                @endif
            </div>
            <div class="star-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <div class="flash-sale-process">
                <div class="text">Đã bán {{ $product->viewed }}</div>
                <div class="icon_hot">
                    <img
                            src="{{ v(Theme::url("assets/v2/images/flash-sale.png")) }}" alt="">
                </div>
            </div>

        </div>
        <div class="product-attribute">
            <i class="fas fa-gift"></i>
            <p>Nhận quà tặng và ưu đãi hấp dẫn khi mua trực tuyến</p>
        </div>
    </div>
</div>
