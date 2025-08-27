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
    <div class="contact-item contact-call">
        <a href="javascript:void(0);" class="contact-btn">
            <img src="{{ Theme::url('assets/v2/images/icons/phone.svg') }}" alt="Phone">
        </a>
        <div class="contact-tooltip tooltip-phone">Gọi Hotline</div>
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

<div id="cb-callPopup" class="cb-popup-overlay cb-hidden">
    <div class="cb-popup-box">
        <button class="cb-popup-close" id="cb-popupClose">&times;</button>

        <h3 class="cb-title">📞 Vui lòng để lại số điện thoại</h3>
        <p class="cb-subtitle">Chúng tôi sẽ gọi lại ngay sau 5 phút.</p>

        <form id="cb-callbackForm" class="cb-form">
            @csrf
            <input type="text" name="phone" placeholder="Nhập số điện thoại..." required class="cb-input"  pattern="^(0[0-9]{9})$" title="Số điện thoại phải có 10 chữ số, bắt đầu bằng 0">
            <button type="submit" class="cb-btn-submit">Yêu cầu gọi lại</button>
        </form>

        <div class="cb-hotlines">
            <p class="cb-hotline-title">Hoặc liên hệ trực tiếp:</p>
            <ul>
                @for($i = 1; $i <= 4; $i++)
                    @if(!empty(setting("contact_hotline_{$i}_number")))
                        <li>
                            <span class="cb-label"><span class="cb-icon">📞</span> {{ setting("contact_hotline_{$i}_name") }}: <span class="cb-number">{{ setting("contact_hotline_{$i}_number") }}</span></span>
                            <a href="tel:{{ setting("contact_hotline_{$i}_number") }}" class="cb-call-now text-decoration-none">Gọi ngay</a>
                        </li>
                    @endif
                @endfor
            </ul>
        </div>

    </div>
</div>

<!-- Overlay -->
<div class="sale-off-overlay"></div>

<div id="cb-modal" class="cb-modal cb-hidden">
    <div class="cb-modal-content">
        <span class="cb-close cursor-pointer">&times;</span>
        <div id="cb-modal-icon"></div>
        <h2 id="cb-modal-title"></h2>
        <p id="cb-modal-message"></p>
        <small id="cb-modal-timer"></small>
    </div>
</div>


@push('scripts')
    <script>
        function showModal(type = 'success', title = 'Thành công', message = '', duration = 4) {
            const $modal = $("#cb-modal");
            const $icon = $("#cb-modal-icon");
            const $title = $("#cb-modal-title");
            const $msg = $("#cb-modal-message");
            const $timer = $("#cb-modal-timer");

            // Reset
            $icon.removeClass("success error");

            // Set type icon
            if (type === 'success') {
                $icon.html("&#10004;").addClass("success"); // check mark ✓
            } else {
                $icon.html("&#10006;").addClass("error"); // X mark ✖
            }

            // Set nội dung
            $title.text(title);
            $msg.text(message);

            let remaining = duration;
            $timer.text(`Thông báo sẽ tự động tắt sau ${remaining} giây...`);

            // Hiện modal
            $modal.removeClass("cb-hidden").addClass("show");

            // Interval cập nhật countdown
            const interval = setInterval(() => {
                remaining--;
                $timer.text(`Thông báo sẽ tự động tắt sau ${remaining} giây...`);
                if (remaining <= 0) {
                    clearInterval(interval);
                }
            }, 1000);

            // Timeout để auto-close
            const timeout = setTimeout(() => {
                clearInterval(interval);
                $modal.removeClass("show").addClass("cb-hidden");
            }, duration * 1000);

            // Click nút X thì tắt ngay
            $(".cb-close").off("click").on("click", function () {
                clearTimeout(timeout);
                clearInterval(interval);
                $modal.removeClass("show").addClass("cb-hidden");
            });
        }

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

            $(".contact-call").on("click", function () {
                $("#cb-callPopup").removeClass("cb-hidden");
            });

            // Đóng popup
            $("#cb-popupClose").on("click", function () {
                $("#cb-callPopup").addClass("cb-hidden");
            });

            // Submit form với AJAX
            $("#cb-callbackForm").on("submit", function (e) {
                e.preventDefault();

                const $btn = $(".cb-btn-submit");
                const originalText = $btn.html();

                // Hiện loading
                $btn.prop("disabled", true).html('<div class="cb-spinner"></div>');

                $.ajax({
                    url: "{{ route('callback.store') }}",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function (res) {
                        showModal("success", "Gửi yêu cầu thành công",
                            "Cảm ơn bạn đã để lại số điện thoại. Chúng tôi sẽ gọi lại trong thời gian sớm nhất.", 4);
                        $("#cb-callPopup").addClass("cb-hidden");
                        $("#cb-callbackForm")[0].reset();
                    },
                    error: function () {
                        showModal("error", "Gửi yêu cầu thất bại",
                            "Có lỗi xảy ra, vui lòng thử lại sau.", 4);
                    },
                    complete: function () {
                        $btn.prop("disabled", false).html(originalText);
                    }
                });
            });
        })
    </script>
@endpush

