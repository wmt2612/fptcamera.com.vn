@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('autolink::auto_links.auto_link')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.auto_links.index') }}">{{ trans('autolink::auto_links.auto_links') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('autolink::auto_links.auto_link')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.auto_links.update', $autoLink) }}" class="form-horizontal" id="auto-link-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}
        {!! $tabs->render(compact('autoLink')) !!}

    </form>
@endsection

@include('autolink::admin.auto_links.partials.shortcuts')
