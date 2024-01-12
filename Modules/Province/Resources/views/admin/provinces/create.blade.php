@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('province::provinces.province')]))

    <li><a href="{{ route('admin.provinces.index') }}">{{ trans('province::provinces.provinces') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('province::provinces.province')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.provinces.store') }}" class="form-horizontal" id="province-create-form" novalidate>
        {{ csrf_field() }}
    </form>
@endsection

@include('province::admin.provinces.partials.shortcuts')
