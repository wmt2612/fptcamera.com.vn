@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('province::provinces.province')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.provinces.index') }}">{{ trans('province::provinces.provinces') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('province::provinces.province')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.provinces.update', $province) }}" class="form-horizontal" id="province-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}

        {!! $tabs->render(compact('province')) !!}
    </form>
@endsection

@include('province::admin.provinces.partials.shortcuts')
