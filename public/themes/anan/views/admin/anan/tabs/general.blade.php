<div class="row">
    <div class="col-md-8">
        {{ Form::text('translatable[anan_welcome_text]', trans('anan::attributes.anan_welcome_text'), $errors, $settings) }}
        {{ Form::select('anan_slider', trans('anan::attributes.anan_slider'), $errors, $sliders, $settings) }}
        {{ Form::select('anan_terms_page', trans('anan::attributes.anan_terms_page'), $errors, $pages, $settings) }}
        {{ Form::select('anan_privacy_page', trans('anan::attributes.anan_privacy_page'), $errors, $pages, $settings) }}
        {{ Form::text('translatable[anan_address]', trans('anan::attributes.anan_address'), $errors, $settings) }}
        {{ Form::text('contact_messenger', 'Messenger', $errors, $settings) }}
        {{ Form::text('product_hotlines', 'Product Hotlines', $errors, $settings) }}
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                <p class="text-danger font-italic" style="font-style: italic;">Note: Các số hotline cách nhau bằng dấu phẩy</p>
            </div>
        </div>

         <div>
            {{ Form::textarea('translatable[support_hotline]', trans('anan::attributes.support_hotline'), $errors,
            $settings) }}
            <div class="row" style="margin-bottom: 10px">
                <div class="col-md-3"></div>
                <div class="col-md-9">
                    <p class="text-danger font-italic" style="font-style: italic;">Note: Mỗi dòng đều phải có dấu phẩy ở cuối dòng</p>
                </div>
            </div>
        </div>
    </div>
</div>
