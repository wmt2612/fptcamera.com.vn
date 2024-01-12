@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('service::services.service')]))

    <li><a href="{{ route('admin.services.index') }}">{{ trans('service::services.services') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('service::services.service')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.services.store') }}" class="form-horizontal" id="service-create-form" novalidate>
        {{ csrf_field() }}

        {!! $tabs->render(compact('service')) !!}
    </form>
@endsection

@include('service::admin.services.partials.shortcuts')
