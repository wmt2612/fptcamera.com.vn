@php
    use Carbon\Carbon;

   $contactZalo = setting('contact_zalo');
   $contactMessenger = setting('contact_messenger');
   $contactPhone = setting('contact_phone');

   $monthYear = 'T' . Carbon::now()->month . '/' . Carbon::now()->year;
   $promoText = "Khuyến Mãi " . $monthYear . " Siêu HOT";

    $saleProducts = [];
@endphp

<div class="contact-buttons">
    <!-- SALE OFF -->
    <div class="contact-item contact-sale">
        <a href="#" class="contact-btn">
            <img src="{{ Theme::url('assets/v2/images/icons/sale_off.svg') }}" alt="Sale Off">
        </a>
        <div class="contact-tooltip tooltip-sale">{{ $promoText }}</div>
    </div>

    <!-- ZALO -->
    <div class="contact-item">
        <a href="https://zalo.me/{{ $contactZalo }}" target="_blank" class="contact-btn">
            <img src="{{ Theme::url('assets/v2/images/icons/zalo.svg') }}" alt="Zalo">
        </a>
        <div class="contact-tooltip tooltip-zalo">Chat với chúng tôi qua Zalo</div>
    </div>

    <!-- PHONE -->
    <div class="contact-item">
        <a href="tel: {{ $contactPhone }}" class="contact-btn">
            <img src="{{ Theme::url('assets/v2/images/icons/phone.svg') }}" alt="Phone">
        </a>
        <div class="contact-tooltip tooltip-phone">Gọi Hotline {{ $contactPhone }}</div>
    </div>
</div>

<div class="sale-off-btn" id="saleOffBtn">
    <a href="javascript:void(0);" class="sale-off-link">
        <img src="{{ Theme::url('assets/v2/images/icons/blue_sale_off.svg') }}" alt="Sale Off">
        <span class="sale-off-badge">{{ count($saleOffProducts) }}</span>
    </a>
    <div class="sale-off-tooltip">{{ $promoText }}</div>
</div>

<!-- Popup -->
<div class="sale-off-popup" id="saleOffPopup">
    <div class="popup-header">
        <span>{{ setting('sale_off_popup_title') ?? 'Khuyến Mãi Dịch Vụ Lắp Đặt Trọn Bộ' }}</span>
        <button class="popup-close" id="closePopup">&times;</button>
    </div>
    <div class="popup-content">
        @foreach($saleOffProducts as $index => $saleProduct)
           @if(!empty($saleProduct['name']))
                <a href="{{ $saleProduct['url'] }}" class="popup-item">
                    <img src="{{ $saleProduct['image']->path }}" alt="Sản phẩm {{ $index }}">
                    <div class="item-info">
                        <h4>@if($saleProduct['is_hot'])<span class="badge-hot">HOT</span> @endif {{ $saleProduct['name'] }}</h4>
                        <p>{{ $saleProduct['desc'] }}</p>
                    </div>
                </a>
           @endif
        @endforeach
    </div>
</div>

<!-- Overlay -->
<div class="sale-off-overlay"></div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $("#saleOffBtn, .contact-sale").on("click", function(e) {
                e.preventDefault();
                $('#saleOffBtn').hide();
                $("#saleOffPopup").addClass("active");
                $(".sale-off-overlay").addClass("active");
            });

            $("#closePopup").on("click", function(e) {
                e.preventDefault()
                $("#saleOffPopup").removeClass("active");
                $(".sale-off-overlay").removeClass("active");
                $("#saleOffBtn").show();
            });
        })
    </script>
@endpush

