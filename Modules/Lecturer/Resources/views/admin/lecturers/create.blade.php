@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('lecturer::lecturers.lecturer')]))

    <li><a href="{{ route('admin.lecturers.index') }}">{{ trans('lecturer::lecturers.lecturers') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('lecturer::lecturers.lecturer')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.lecturers.store') }}" class="form-horizontal" id="lecturer-create-form" novalidate>
        {{ csrf_field() }}

        {!! $tabs->render(compact('lecturer')) !!}
    </form>
@endsection

@include('lecturer::admin.lecturers.partials.shortcuts')
