<div class="row">
    <div class="col-md-8">
        {{ Form::select('active_theme', trans('setting::attributes.themes'), $errors, $themes, $settings, ['required' => true]) }}
    </div>
</div>
