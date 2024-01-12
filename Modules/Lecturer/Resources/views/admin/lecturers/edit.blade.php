@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('lecturer::lecturers.lecturer')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.lecturers.index') }}">{{ trans('lecturer::lecturers.lecturers') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('lecturer::lecturers.lecturer')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.lecturers.update', $lecturer) }}" class="form-horizontal" id="lecturer-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}
        {!! $tabs->render(compact('lecturer')) !!}
    </form>
@endsection

@include('lecturer::admin.lecturers.partials.shortcuts')
