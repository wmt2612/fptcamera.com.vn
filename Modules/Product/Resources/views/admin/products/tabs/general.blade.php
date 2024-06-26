{{ Form::text('name', trans('product::attributes.name'), $errors, $product, ['labelCol' => 2, 'required' => true]) }}
{{ Form::text('short_name', trans('product::attributes.short_name'), $errors, $product, ['labelCol' => 2]) }}
{{ Form::text('gift_note', trans('product::attributes.gift_note'), $errors, $product, ['labelCol' => 2]) }}
{{ Form::wysiwyg('short_description', trans('product::attributes.short_description'), $errors, $product, ['labelCol' => 2, 'required' => true]) }}
{{ Form::wysiwyg('info_1', trans('product::attributes.info_1'), $errors, $product, ['labelCol' => 2, 'required' => false]) }}
{{ Form::wysiwyg('info_2', trans('product::attributes.info_2'), $errors, $product, ['labelCol' => 2, 'required' => false]) }}
{{ Form::wysiwyg('description', trans('product::attributes.description'), $errors, $product, ['labelCol' => 2, 'required' => true]) }}
{{ Form::wysiwyg('specifications', trans('product::attributes.specifications'), $errors, $product, ['labelCol' => 2, 'required' => true]) }}
<div class="row">
    <div class="col-md-8">
        {{ Form::select('brand_id', trans('product::attributes.brand_id'), $errors, $brands, $product) }}
        {{ Form::select('categories', trans('product::attributes.categories'), $errors, $categories, $product, ['class' => 'selectize prevent-creation', 'multiple' => true]) }}
        {{-- {{ Form::select('tax_class_id', trans('product::attributes.tax_class_id'), $errors, $taxClasses, $product) }} --}}
        {{ Form::select('tags', trans('product::attributes.tags'), $errors, $tags, $product, ['class' => 'selectize prevent-creation', 'multiple' => true]) }}
        {{ Form::input('created_at', trans('product::attributes.created_at'), $errors, $product, ['type' =>
        'datetime-local', 'data-date-format' => "dd-mm-yyyy"]) }}
        {{ Form::checkbox('is_active', trans('product::attributes.is_active'), trans('product::products.form.enable_the_product'), $errors, $product) }}
    </div>
</div>
@if($product->id)
<div class="form-group"><label for="short_name" class="col-md-2 control-label text-left">Replicate</label>
    <div class="col-md-10">
        <button class="btn btn-danger" id="btnReplicateProduct">Copy</button>
    </div>
</div>
@endif
