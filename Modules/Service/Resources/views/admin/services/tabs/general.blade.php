{{ Form::text('name', trans('service::attributes.name'), $errors, $service, ['labelCol' => 2, 'required' => true]) }}
{{ Form::select('category_service_id', trans('service::attributes.category_service'), $errors, $categories_service, $service, ['labelCol' => 2, 'class' => 'selectize prevent-creation']) }}
{{ Form::wysiwyg('feature', trans('service::attributes.feature'), $errors, $service, ['labelCol' => 2, 'required' => true]) }}
{{ Form::text('bandwidth', trans('service::attributes.bandwidth'), $errors, $service, ['labelCol' => 2]) }}
{{ Form::checkbox('is_hot', trans('service::attributes.is_hot'), null, $errors, $service, ['labelCol' => 2]) }}

