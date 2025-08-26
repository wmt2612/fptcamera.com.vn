{{ Form::text('sale_off_popup_title', trans('anan::anan.form.sale_off_popup_title'), $errors, $settings) }}
<div class="media-picker-divider"></div>
<h3 style="margin-bottom: 15px">Sale Products</h3>
<div id="saleProducts">
    @for($i = 1; $i <= 10; $i++)
        @php
            $prodImg = "productImage{$i}";
        @endphp
        <div id="saleProductItem">
            @include('media::admin.image_picker.single', [
              'title' => $i . ' - ' . trans('anan::anan.form.sale_off_popup_product_image'),
              'inputName' => "sale_off_popup_product_{$i}_image",
              'file' => $$prodImg,
          ])
            {{ Form::text("sale_off_popup_product_{$i}_name", trans('anan::anan.form.sale_off_popup_product_name'), $errors, $settings) }}
            {{ Form::text("sale_off_popup_product_{$i}_desc", trans('anan::anan.form.sale_off_popup_product_desc'), $errors, $settings) }}
            {{ Form::text("sale_off_popup_product_${i}_url", trans('anan::anan.form.sale_off_popup_product_url'), $errors, $settings) }}
            {{ Form::checkbox("sale_off_popup_product_${i}_is_hot", trans('anan::anan.form.sale_off_popup_product_is_hot'), 'Enable', $errors, $settings) }}
        </div>
    @endfor
</div>

