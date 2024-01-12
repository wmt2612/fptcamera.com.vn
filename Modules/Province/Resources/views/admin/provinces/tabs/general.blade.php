{{ Form::text('name', trans('area::attributes.name'), $errors, $province, ['labelCol' => 2, 'required' => true]) }}
{{ Form::select('area_id', trans('service::attributes.category_service'), $errors, $areas, $province, ['labelCol' => 2, 'class' => 'selectize prevent-creation']) }}
