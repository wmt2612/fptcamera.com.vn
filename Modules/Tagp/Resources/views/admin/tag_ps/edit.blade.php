@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('tagp::tag_ps.tag_p')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.tag_ps.index') }}">{{ trans('tagp::tag_ps.tag_ps') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('tagp::tag_ps.tag_p')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.tag_ps.update', $tagP) }}" class="form-horizontal" id="tag-p-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}

        {!! $tabs->render(compact('tagP')) !!}
    </form>
@endsection

@include('tagp::admin.tag_ps.partials.shortcuts')
