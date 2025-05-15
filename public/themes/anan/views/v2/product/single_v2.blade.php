<div class="box_product">
    <div class="img">
        <a href="{{ $product->url() }}">
            <img loading="lazy" src="{{ $product->thumbnail() }}" alt="{{ $product->name }}">
        </a>
        <div class=" temp sphot ">
            <span>-{{ $product->price_percent_convert }}%</span>
        </div>
        @if($product->frame_image->path)
            <div class="product-img-frame">
                <a href="{{ $product->url() }}">
                    <img loading="lazy" src="{{ $product->frame_image->path }}" />
                </a>
            </div>
        @endif
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

        @if($product->hasSpecialPrice() && !$product->contact_for_price && $product->special_price_end)
            <div class="sale-countdown-timer"
                 data-start-time="{{ optional($product->special_price_start)->toIso8601String() }}"
                 data-end-time="{{ $product->special_price_end->toIso8601String() }}">
               <span>{{ $product->special_price_remaining }}</span>
            </div>
        @endif
        <div class="star-rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </div>
        @php
            $productAttributes = $product->attributeValues();
        @endphp
        @if(count($productAttributes) > 0)
            <div class="product-attributes">
                @foreach($productAttributes as $attributeValue)
                    <span>{{ $attributeValue->value }}</span>
                @endforeach
            </div>
        @endif
        <div class="flash-sale-process">
            <div class="text">Đã bán {{ $product->viewed }}</div>
            <div class="icon_hot">
                <img loading="lazy"
                     src="{{ v(Theme::url("assets/v2/images/flash-sale.png")) }}" alt="sold">
            </div>
        </div>

    </div>
    <div class="product-attribute">
        <i class="fas fa-gift"></i>
        <p>{{ $product->gift_note ?? 'Nhận quà tặng và ưu đãi hấp dẫn khi mua trực tuyến' }} </p>
    </div>
</div>