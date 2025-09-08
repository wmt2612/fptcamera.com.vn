@if($section && $section->status)
    <section class="lock_smart custem_slider ">
        <div class="container">
            <div class="title home_title">
                <h2>
                    <span class="title-main">{{ $section->title }}</span>
                    <div class="sub_title">
                        @if(!empty($section->categories) && count($section->categories) > 0)
                            <div class="tab">
                                @foreach($section->categories as $category)
                                    <a href="{{ route('product.category', ['slug' => $category->slug]) }}">
                                        {{ $category->name }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                        @if(!empty($section->view_more_link))
                            <div class="view_more">
                                <a href="{{ $section->view_more_link }}">
                                    {{ $section->view_more_title ?? 'Xem thêm' }}
                                    <i class="fas fa-angle-right"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                </h2>
            </div>

            <div class="row product_slider">
                @foreach($section->products as $product)
                    @include('v2.product.single_v2', ['product' => $product])
                @endforeach
            </div>
        </div>
    </section>
@endif
