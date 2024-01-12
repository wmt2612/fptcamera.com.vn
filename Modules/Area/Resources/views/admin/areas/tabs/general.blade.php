{{ Form::text('name', trans('area::attributes.name'), $errors, $area, ['labelCol' => 2, 'required' => true]) }}
{{ Form::wysiwyg('description', trans('area::attributes.description'), $errors, $area, ['labelCol' => 2]) }}
