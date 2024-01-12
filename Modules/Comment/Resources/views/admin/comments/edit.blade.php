@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('comment::comments.comment')]))

    <li><a href="{{ route('admin.comments.index') }}">{{ trans('comment::comments.comments') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('comment::comments.comment')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.comments.update', $comment) }}" class="form-horizontal" id="comment-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}

        {!! $tabs->render(compact('comment')) !!}
    </form>
@endsection

@push('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('admin::admin.shortcuts.back_to_index', ['name' => trans('comment::comments.comment')]) }}</dd>
    </dl>
@endpush

@push('scripts')
    <script>
        keypressAction([
            { key: 'b', route: "{{ route('admin.comments.index') }}" },
        ]);
    </script>
@endpush
