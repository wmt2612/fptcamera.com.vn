@php
    if (isset($autoLink) && !$autoLink->id) {
        $autoLink->limit = 5;
    }
@endphp
<div class="row">
    <div class="col-md-12">
        {{ Form::text('title', trans('autolink::attributes.title'), $errors, $autoLink, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('target_url', trans('autolink::attributes.target_url'), $errors, $autoLink, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::select('target_type', trans('autolink::attributes.target_type'), $errors, $targetTypes, $autoLink, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::text('limit', trans('autolink::attributes.limit'), $errors, $autoLink, ['labelCol' => 2, 'required' => true]) }}
        {{ Form::checkbox('for_post', trans('autolink::attributes.for_post'), trans('autolink::auto_links.form.enable_for_post'), $errors, $autoLink, ['labelCol' => 2]) }}
{{--        {{ Form::checkbox('for_page', trans('autolink::attributes.for_page'), trans('autolink::auto_links.form.enable_for_page'), $errors, $autoLink, ['labelCol' => 2]) }}--}}
        {{ Form::checkbox('is_duplicate', trans('autolink::attributes.is_duplicate'), trans('autolink::auto_links.form.allow_duplicate'), $errors, $autoLink, ['labelCol' => 2]) }}
{{--        {{ Form::checkbox('is_override', trans('autolink::attributes.is_override'), trans('autolink::auto_links.form.override_old_link'), $errors, $autoLink, ['labelCol' => 2]) }}--}}
        {{ Form::checkbox('is_active', trans('autolink::attributes.is_active'), trans('autolink::auto_links.form.enable_the_auto_link'), $errors, $autoLink, ['labelCol' => 2]) }}
    </div>
</div>
