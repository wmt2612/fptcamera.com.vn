<div class="row">
    <div class="col-md-8">
        {{ Form::text('name', trans('tag::attributes.name'), $errors, $tagP, ['required' => true]) }}

        @if ($tagP->exists)
            {{ Form::text('slug', trans('tag::attributes.slug'), $errors, $tagP, ['required' => true]) }}
        @endif
    </div>
</div>
