@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('area::areas.area')]))

    <li><a href="{{ route('admin.areas.index') }}">{{ trans('area::areas.areas') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('area::areas.area')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.areas.store') }}" class="form-horizontal" id="area-create-form" novalidate>
        {{ csrf_field() }}

        {!! $tabs->render(compact('area')) !!}
        {{-- @include('area::admin.areas.tabs.general') --}}
    </form>
@endsection

@include('area::admin.areas.partials.shortcuts')
