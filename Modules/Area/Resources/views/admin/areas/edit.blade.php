@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('area::areas.area')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.areas.index') }}">{{ trans('area::areas.areas') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('area::areas.area')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.areas.update', $area) }}" class="form-horizontal" id="area-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}

        {!! $tabs->render(compact('area')) !!}
        {{-- @include('area::admin.areas.tabs.general') --}}
    </form>
@endsection

@include('area::admin.areas.partials.shortcuts')
