@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('comment::comments.comment')]))

    <li><a href="{{ route('admin.comments.index') }}">{{ trans('comment::comments.comments') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('comment::comments.comment')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.comments.store') }}" class="form-horizontal" id="comment-create-form" novalidate>
        {{ csrf_field() }}
    </form>
@endsection

@include('comment::admin.comments.partials.shortcuts')
