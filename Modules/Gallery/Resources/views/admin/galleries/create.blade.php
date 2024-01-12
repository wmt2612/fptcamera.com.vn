@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('gallery::galleries.gallery')]))

    <li><a href="{{ route('admin.galleries.index') }}">{{ trans('gallery::galleries.galleries') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('gallery::galleries.gallery')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.galleries.store') }}" class="form-horizontal" id="gallery-create-form" novalidate>
        {{ csrf_field() }}

        {!! $tabs->render(compact('gallery')) !!}
    </form>
@endsection

@include('gallery::admin.galleries.partials.shortcuts')
