<div class="az-product-item ">
    <div class="az-overflow">
        @if ($item->hasSpecialPrice())
        <span class="az-sale-label">-{{ $item->price_percent_convert }}%</span>
        @endif
        <a href="{{ route('product.single', ['slug' => $item->slug]) }}" class="nt-img d-block">
            <img width="300" height="300" src="{{ $item->base_image->path }}"
                class="attachment-thumbnail size-thumbnail wp-post-image" alt="thẻ nhớ Dahua DSS 32GB" loading="lazy"
                sizes="(max-width: 300px) 100vw, 300px" />
        </a>
        <a href="{{ route('product.single', ['slug' => $item->slug]) }}" class="az-box-product-des">
            <h3 class="az-title-post nowrap-2 text-left">{{ $item->name }}
            </h3>
            <div class="az-price text-left">
                @if($item->contact_for_price)
                <ins>Giá liên hệ</ins>
                @elseif ($item->hasSpecialPrice())
                <ins>{{ $item->selling_price->format() }}</ins>
                <del>{{ $item->price->format() }}</del>
                @else
                <ins>{{ $item->selling_price->format() }}</ins>
                @endif
            </div>
        </a>
    </div>
</div>