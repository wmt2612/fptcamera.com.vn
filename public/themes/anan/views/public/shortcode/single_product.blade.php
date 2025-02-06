<div class="single-product-block">
    <div class="single-product-image">
        <img alt="{{$product->name}}" src="{{ $product->base_image->path }}"/>
    </div>
    <div class="single-product-content">
        @if($category)
            <a href="{{ route('product.category', ['slug' => $category->slug]) }}" class="single-product-category">{{ $category->name }}</a>
        @endif
        <p class="single-product-name">{{ $product->name }}</p>
        <div class="single-product-desc">
            {!! $customDesc ?? $product->info_1 !!}
        </div>
        <a href="{{ route('product.single', ['slug' => $product->slug]) }}" target="_blank" class="single-product-button">
            Xem thêm
        </a>
    </div>
</div>