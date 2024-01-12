<div class="col-xl-3 az-sidebar-product d-lg-none d-xl-block">
    @for ($i = 1; $i < 4; $i++)
        {!! setting('anan_product_sidebar_widget_'.$i) !!}
    @endfor
    <div class="az-widget-product-single widget-3 widget-4 mt-10 stick-box-widget"
        style="position: sticky; top: 50px;">
        <div class="content-widget">
            <h4 class="pb-15 mb-15">SẢN PHẨM BẠN ĐANG XEM</h4>
            <div class="stick-product">
                <div class="ft-img">
                    <img width="700" height="700" src="{{ $product->base_image->path }}"
                        class="attachment-full size-full wp-post-image" alt="{{ $product->name }}"
                        loading="lazy" sizes="(max-width: 700px) 100vw, 700px" />
                </div>
                <div class="info-product text-center">
                    <h5 class="text-center">{{ $product->name }}
                    </h5>
                    @if ($product->contact_for_price)
                    <p class='info-price text-center'>
                        Giá liên hệ
                    </p>
                    @elseif($product->hasSpecialPrice())
                    <p class="info-price text-center">
                        {{ $product->selling_price->format() }}
                        <del>{{ $product->price->format() }}</del>
                    </p>
                    @else
                    <p class="info-price text-center">
                        {{ $product->selling_price->format() }}
                    </p>
                    @endif
                    <a class="stick-btn-cart btn-buy-sidebar" href="#">Mua Ngay</a>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-buynow-mobile text-center d-block d-sm-none">
        <button type="submit" form="form-cart" class="stick-btn-cart"><i
                class="fa fa-shopping-cart" aria-hidden="true"></i> Mua Ngay</button>
    </div>
</div>
