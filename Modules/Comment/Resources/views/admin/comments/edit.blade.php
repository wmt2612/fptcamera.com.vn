@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('comment::comments.comment')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.comments.index') }}">{{ trans('comment::comments.comments') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('comment::comments.comment')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.comments.update', $comment) }}" class="form-horizontal" id="comment-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}
    </form>
@endsection

@include('comment::admin.comments.partials.shortcuts')
