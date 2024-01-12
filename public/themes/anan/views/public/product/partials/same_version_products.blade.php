@push('styles')
<style>
    .product_con ul.show_mode_list {
        display: -webkit-flex;
        display: -moz-flex;
        display: -ms-flex;
        display: -o-flex;
        display: flex;
    }

    .product_con ul {
        width: 100%;
        padding-left: 0;
        margin-bottom: 10px;
        flex-flow: row nowrap;
        justify-content: flex-start;
        overflow-y: hidden;
        overflow-x: auto;
        -ms-overflow-style: none;
        -ms-scroll-snap-points-x: snapInterval(0%, 100%);
        -ms-scroll-chaining: chained;
        -webkit-overflow-scrolling: touch;
        white-space: nowrap;
        display: none;
        list-style-type: none;
    }

    .product_con ul li.active,
    .product_con ul li:hover {
        border: 1px solid #3d8dc9;
        -moz-box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .15);
        -webkit-box-shadow: 0 2px 3px 0 rgb(0 0 0 / 15%);
        box-shadow: 0 2px 3px 0 rgb(0 0 0 / 15%);
        background: #f2f8fd;
    }

    .product_con ul li {
        text-align: center;
        position: relative;
        background: #fff;
        border: 1px solid #ddd;
        -moz-border-radius: 3px;
        -webkit-border-radius: 3px;
        border-radius: 3px;
        min-width: calc(33% - 10px);
        text-align: center;
        padding: 5px 5px;
        cursor: pointer;
        margin-right: 10px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .product_con ul li a {
        display: flex;
        flex-direction: column;
    }

    .product_con ul li.active h6 {
        font-weight: bold;
    }
    

    .product_con ul li h6 {
        font-weight: normal;
        overflow: hidden;
        text-transform: uppercase;
        color: #595959;
        height: 20px;
        line-height: 20px;
        margin-bottom: 0;
        font-size: 15px;
    }

    .product_con ul li p {
        font-size: 16px !important;
        margin-bottom: 0;
        margin-top: 5px;
        color: #d0021b !important;
        font-weight: bold;
    }

    .product_con ul li h6 img {
        display: inline-block;
        height: 14px;
        vertical-align: middle;
    }

    .product_con ul li .tooltiptext {
        visibility: hidden;
        background-color: #3d8dc9;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        top: 1rem;
        left: 2rem;
        font-size: 13px;
        overflow: visible !important;
        /* Position the tooltip */
        position: absolute;
        z-index: 2;
    }

    .product_con ul li:hover .tooltiptext {
        visibility: visible;
    }

    
</style>
@endpush
<div class="product_con">
    @if (count($sameVersionProducts) > 0)
    <p>Xem thêm các phiên bản khác tại đây: </p>
    <ul class="list_model_mobile show_mode_list">
        <li class="active" data-url="{{ route('product.single', ['slug' => $product->slug]) }}">
            <span class="tooltip" style="display:none">Vui lòng chọn phiên bản để
                xem giá<br>và thông số của từng phiên bản</span>
            <a href="{{ route('product.single', ['slug' => $product->slug]) }}">
                <h6>
                    {{-- <img src="https://digione.vn/pub/img/hinh-tron-check.svg" alt="hinh-tron"> --}}
                    <span>{{ $product->short_name ?? substr($product->name, 0, 5)}}</span>
                </h6>
                {{-- <p>
                    @if($product->contact_for_price)
                    <span>Giá liên hệ</span>
                    @elseif ($product->hasSpecialPrice())
                    <span>{{ $product->selling_price->format() }}</span>
                    @else
                    <span>{{ $product->selling_price->format() }}</span>
                    @endif
                </p> --}}
            </a>
        </li>

        @foreach ($sameVersionProducts as $svProduct)
        <li class="@if($svProduct->id == $product->id) active @endif" data-url="{{ route('product.single', ['slug' => $svProduct->slug]) }}">
            <span class="tooltip" style="display:none">Vui lòng chọn phiên bản để
                xem giá<br>và thông số của từng phiên bản</span>
            <a href="{{ route('product.single', ['slug' => $svProduct->slug]) }}">
                <h6>
                    {{-- @if($svProduct->id == $product->id)
                    <img src="https://digione.vn/pub/img/hinh-tron-check.svg" alt="hinh-tron">
                    @else
                    <img src="https://digione.vn/pub/img/hinh-tron.svg" alt="hinh-tron">
                    @endif --}}
                  
                    <span>{{ $svProduct->short_name ?? substr($product->name, 0, 5) }}</span>
                </h6>
                {{-- <p>
                    @if($svProduct->contact_for_price)
                    <span>Giá liên hệ</span>
                    @elseif ($svProduct->hasSpecialPrice())
                    <span>{{ $svProduct->selling_price->format() }}</span>
                    @else
                    <span>{{ $svProduct->selling_price->format() }}</span>
                    @endif
                </p> --}}
            </a>
        </li>
        @endforeach
    </ul>
    {{-- <div class="list_model_pc hide_mode_owl">
        <span class="nav_owl nav_prev"><img src="../pub/img/arrow-left.png?v=0.1"></span>
        <div class="owl_content">
            <div class="owl-carousel owl-theme owl-loaded owl-drag" id="owl_product_con">


                <div class="owl-stage-outer">
                    <div class="owl-stage"
                        style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 227px;">
                        <div class="owl-item active" style="width: 103.333px; margin-right: 10px;">
                            <div class="active">
                                <a href="cac-hang-camera/camera-imou-ranger-2-a22ep-1080p.html">
                                    <h6>
                                        <img src="pub/img/hinh-tron-check.svg" alt="hinh-tron"> A22EP 1080P
                                    </h6>
                                    <p>890.000<sup>đ</sup></p>
                                </a>
                            </div>
                        </div>
                        <div class="owl-item active" style="width: 103.333px; margin-right: 10px;">
                            <div class="">
                                <a href="cac-hang-camera/camera-imou-a42p-ranger-2-4mp.html">
                                    <h6>
                                        <img src="pub/img/hinh-tron.png" alt="hinh-tron"> A42P-D 4.0MP
                                    </h6>
                                    <p>1.390.000<sup>đ</sup></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-nav disabled">
                    <div class="owl-prev">prev</div>
                    <div class="owl-next">next</div>
                </div>
                <div class="owl-dots disabled">
                    <div class="owl-dot active"><span></span></div>
                </div>
            </div>
        </div>
        <span class="nav_owl nav_next"><img src="../pub/img/arrow-right.png?v=0.1"></span>
    </div> --}}
    @endif
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.product_con ul li').click(function(e) {
                window.location.replace($(this).data('url'));
            })
        })
    </script>
@endpush