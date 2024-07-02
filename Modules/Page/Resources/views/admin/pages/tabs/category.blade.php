
<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('is_display_category', trans('page::attributes.is_display_category'), trans('page::pages.form.enable_category_theme'), $errors, $page) }}
        {{ Form::select('categories', trans('page::attributes.categories'), $errors, $categories, $page, ['class' => 'selectize prevent-creation', 'multiple' => true]) }}
    </div>
</div>
