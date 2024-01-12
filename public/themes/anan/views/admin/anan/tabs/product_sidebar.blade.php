<div class="row">
    <div class="col-lg-12">
        <h3 class="tab-content-title">Product Sidebar</h3>
    </div>
    @for ($i = 1; $i < 4; $i++)
        <div class="col-lg-6">
            {{ Form::wysiwyg('anan_product_sidebar_widget_'.$i, null, $errors, $settings, ['placeholder' => trans('anan::attributes.content'), 'labelCol' => 0]) }}
        </div>
    @endfor
</div>
<div class="row">
    <div class="col-lg-12">
        <h3 class="tab-content-title">Product Promotion</h3>
    </div>
    <div class="col-lg-12">
        {{ Form::wysiwyg('anan_product_promotion_widget', null, $errors, $settings, ['placeholder' => trans('anan::attributes.content'), 'labelCol' => 0]) }}
    </div>
</div>

