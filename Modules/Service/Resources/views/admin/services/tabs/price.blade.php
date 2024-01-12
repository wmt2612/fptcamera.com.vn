<div class="row">
    <div class="col-md-8">
        {{ Form::number('price', trans('service::attributes.price'), $errors, $service, ['min' => 0]) }}
    </div>
</div>
