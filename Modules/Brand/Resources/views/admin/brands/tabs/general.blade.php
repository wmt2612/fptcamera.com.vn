<div class="row">
    <div class="col-md-12">
        {{ Form::text('name', trans('brand::attributes.name'), $errors, $brand, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::wysiwyg('description', trans('brand::attributes.description'), $errors, $brand, ['labelCol' => 2]) }}
        {{ Form::checkbox('is_active', trans('brand::attributes.is_active'), trans('brand::brands.form.enable_the_brand'), $errors, $brand, ['labelCol' => 2]) }}
    </div>
</div>
