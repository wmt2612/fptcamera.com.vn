<footer class="az-footer">
    <div class="container">
        <div class="row az-ft-contact">
            <div class="col-lg-6">
                <div class="ft-left">
                    <div class="title">
                        <h4>ĐĂNG KÝ NHẬN TIN KHUYẾN MÃI HOT MỖI NGÀY</h4>
                    </div>
                    <div class="subtitle">
                        <span>Đừng bỏ lỡ hàng ngàn sản phẩm từ chương trình siêu hấp dẫn</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ft-right">
                    <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-222" method="post" data-id="222"
                        data-name="Form footer">
                        <div class="mc4wp-form-fields">
                            <input type="email" class="input-email" name="EMAIL" placeholder="Địa chỉ email của bạn"
                                required />
                            <input type="submit" class="input-submit" value="Đăng ký" />
                        </div>
                        <label style="display: none !important;">Leave this field empty if you're human: <input
                                type="text" name="_mc4wp_honeypot" value="" tabindex="-1"
                                autocomplete="off" /></label><input type="hidden" name="_mc4wp_timestamp"
                            value="1627288535" /><input type="hidden" name="_mc4wp_form_id" value="222" /><input
                            type="hidden" name="_mc4wp_form_element_id" value="mc4wp-form-1" />
                        <div class="mc4wp-response"></div>
                    </form>
                    <!-- / Mailchimp for WordPress Plugin -->
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container">
        <div class="row">
            <div class="col-12 az-menu-tag">
                <ul id="menu-tu-khoa-tim-kiem" class="menu">
                    <li><span>Tìm kiếm nhiều:</span></li>
                    <li id="menu-item-64395"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-64395"><a
                            href="./category-1.html">Dashcam Hikvision</a></li>
                    <li id="menu-item-53390"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-53390"><a
                            href="./category-1.html">Camera wifi ngoài trời nào tốt</a></li>
                    <li id="menu-item-53393"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-53393"><a
                            href="./category-1.html">Máy chấm công nhận diện khuôn mặt</a></li>
                    <li id="menu-item-53401"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-53401"><a
                            href="./category-1.html">Cách reset camera Hikvision</a></li>
                    <li id="menu-item-53391"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-53391"><a
                            href="./category-1.html">Robot hút bụi nào tốt</a></li>
                    <li id="menu-item-53399"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-53399"><a
                            href="./category-1.html">KIT camera Hikvision</a></li>
                    <li id="menu-item-53394"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-53394"><a
                            href="./category-1.html">Thiết bị wifi marketing</a></li>
                    <li id="menu-item-53395"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-53395"><a
                            href="./category-1.html">Camera EZVIZ giá rẻ</a></li>
                    <li id="menu-item-53397"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-53397"><a
                            href="./category-1.html">Lắp đặt camera nhà xưởng</a></li>
                    <li id="menu-item-53400"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-53400"><a
                            href="./category-1.html">Camera iMOU</a></li>
                    <li id="menu-item-53402"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-53402"><a
                            href="./category-1.html">Đầu ghi hình Hikvision bán chạy</a></li>
                    <li id="menu-item-53403"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-53403"><a
                            href="./category-1.html">Camera IP Wifi giá rẻ</a></li>
                    <li id="menu-item-64425"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-64425"><a
                            href="./category-1.html">giá lắp camera cho gia đình</a></li>
                </ul>
            </div>
        </div>
    </div> --}}
    <div class="bg-ft-box d-md-none d-xl-block">
        <div class="container">
            <div class="row az-ft-box">
                @for ($i = 1; $i < 4; $i++)
                <div class="col-md-4">
                    <div class="box box-content-{{$i}}">
                        <div class="title">
                            <h4>{{ setting('anan_footer_section_one_title_'.$i) }}</h4>
                        </div>
                        <div class="subtitle">
                            <span>
                                {{ setting('anan_footer_section_one_subtitle_'.$i) }}
                            </span>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>
    <div class="bg-ft-link">
        <div class="container">
            <div class="row az-ft-link ft-link-row-1">
                @for ($i = 1; $i < 6; $i++)
                {!! setting('anan_footer_section_two_'.$i) !!}
                @endfor
            </div>
            <!-- pc -->
            <!-- <div class="d-none d-sm-block"> -->
            <div class="row az-ft-link ft-link-row-2">
                @for ($i = 1; $i < 5; $i++)
                {!! setting('anan_footer_section_three_'.$i) !!}
                @endfor
            </div>
            <!-- </div> -->
            <!-- end pc -->
        </div>
    </div>
    <div class="container">
        <div class="row az-ft-copyright">
            <div class="col-md-5">
                <div class="ft-img-note text-right">
                    <ul class="list-img-note fll-footer-mb">
                        <li><a href="#" target="_blank" rel="nofollow"><img
                                    src="{{ Theme::url('assets/images/thongbao.png ') }}" alt="vuhoangtelecom"></a></li>
                        <!-- <li><img src="https://vuhoangtelecom.vn/{{ Theme::url('assets/images/dangky.png ') }}"></li> -->
                    </ul>
                </div>
            </div>
            <div class="col-md-7">
                <div class="content text-left">
                    <span>
                        {{ setting('anan_footer_section_four_giayphep') }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="btn_scroll_top">
    <a href="#" class="scrollup" style="display: block; right: 130px; bottom: 60px"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
</div>
<!-- Modal Tư Vấn -->
<div id="myModal-tuvan" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">Nhập thông tin</h4>
            </div>
            <div role="form" class="wpcf7" id="wpcf7-f15373-o1" lang="vi" dir="ltr">
                <div class="screen-reader-response">
                    <p role="status" aria-live="polite" aria-atomic="true"></p>
                    <ul></ul>
                </div>
                <form
                    action="https://vuhoangtelecom.vn/san-pham/camera-wifi-4mp-ipc-a42p-b-imou-phat-hien-nguoi-la-bang-ai/#wpcf7-f15373-o1"
                    method="post" class="wpcf7-form init">
                    <div class="modal-body">
                        (*) Thông tin bắt buộc</p>
                        <div class="form-group">
                            <span class="wpcf7-form-control-wrap hoten-tuvan"><input type="text" name="hoten-tuvan"
                                    value="" size="40" class="wpcf7-form-control wpcf7-text form-control"
                                    aria-invalid="false" placeholder="Họ tên (*)" /></span>
                        </div>
                        <div class="form-group">
                            <span class="wpcf7-form-control-wrap phone-tuvan"><input type="tel" name="phone-tuvan"
                                    value="" size="40"
                                    class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel form-control"
                                    aria-required="true" aria-invalid="false"
                                    placeholder="Số điện thoại liên hệ (*)" /></span>
                        </div>
                        <div class="form-group">
                            <span class="wpcf7-form-control-wrap email-tuvan"><input type="email" name="email-tuvan"
                                    value="" size="40"
                                    class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control"
                                    aria-required="true" aria-invalid="false" placeholder="Email (*)" /></span>
                        </div>
                        <div class="form-group">
                            <span class="wpcf7-form-control-wrap khuvuc">
                                <select name="khuvuc"
                                    class="wpcf7-form-control wpcf7-select wpcf7-validates-as-required form-control"
                                    aria-required="true" aria-invalid="false">
                                    <option value="">Chọn khu vực (*)</option>
                                    <option value="Miền Bắc">Miền Bắc</option>
                                    <option value="Miền Trung">Miền Trung</option>
                                    <option value="Miền Nam">Miền Nam</option>
                                </select>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="wpcf7-form-control-wrap info"><input type="text" name="info" value="" size="40"
                                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control"
                                    aria-required="true" aria-invalid="false"
                                    placeholder="Ghi chú hoặc câu hỏi (Không bắt buộc)" /></span>
                        </div>
                        <p style="color:#333">Vui lòng nhập thông tin để chúng tôi liên hệ với bạn. </br>Dịch vụ hỗ trợ
                            "Tư vấn miễn phí" trên website sẽ hoạt động từ 08h00 - 17h00 hằng ngày. </br>Xin chân thành
                            cảm ơn!</p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" value="Gửi thông tin"
                            class="wpcf7-form-control wpcf7-submit submit-tuvan" /></br><br />
                        <button type="button" class="btn btn-default close-tuvan" data-dismiss="modal">Đóng</button>
                    </div>
                    <div class="wpcf7-response-output" aria-hidden="true"></div>
                </form>
            </div>
        </div>
    </div>
</div>

