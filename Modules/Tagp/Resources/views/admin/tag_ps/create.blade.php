@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('tagp::tag_ps.tag_p')]))

    <li><a href="{{ route('admin.tag_ps.index') }}">{{ trans('tagp::tag_ps.tag_ps') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('tagp::tag_ps.tag_p')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.tag_ps.store') }}" class="form-horizontal" id="tag-p-create-form" novalidate>
        {{ csrf_field() }}

        {!! $tabs->render(compact('tagP')) !!}
    </form>
@endsection

@include('tagp::admin.tag_ps.partials.shortcuts')
