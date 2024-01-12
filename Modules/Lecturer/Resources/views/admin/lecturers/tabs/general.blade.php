{{ Form::text('name', trans('lecturer::attributes.name'), $errors, $lecturer, ['labelCol' => 2, 'required' => true]) }}
{{ Form::text('certificate', trans('lecturer::attributes.certificate'), $errors, $lecturer, ['labelCol' => 2]) }}
{{ Form::wysiwyg('description', trans('lecturer::attributes.description'), $errors, $lecturer, ['labelCol' => 2]) }}
{{ Form::wysiwyg('qualifications', trans('lecturer::attributes.qualifications'), $errors, $lecturer, ['labelCol' => 2]) }}
@if ($lecturer->slug ?? false)
{{ Form::text('slug', trans('page::attributes.slug'), $errors, $lecturer, ['labelCol' => 2, 'required' => true]) }}
@endif
<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('is_active', trans('lecturer::attributes.is_active'), trans('lecturer::lecturers.form.enable_the_lecturer'), $errors, $lecturer) }}
    </div>
</div>
