@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('gallery::galleries.gallery')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.galleries.index') }}">{{ trans('gallery::galleries.galleries') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('gallery::galleries.gallery')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.galleries.update', $gallery) }}" class="form-horizontal" id="gallery-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}

        {!! $tabs->render(compact('gallery')) !!}
    </form>
@endsection

@include('gallery::admin.galleries.partials.shortcuts')
