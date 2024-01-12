{{ Form::text('name', trans('gallery::attributes.name'), $errors, $gallery, ['labelCol' => 2, 'required' => true]) }}
{{ Form::wysiwyg('description', trans('gallery::attributes.description'), $errors, $gallery, ['labelCol' => 2]) }}
