@extends('admin::layout')

@section('title', trans('anan::anan.anan'))

@section('content_header')
    <h3>{{ trans('anan::anan.anan') }}</h3>

    <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard.index') }}">{{ trans('admin::dashboard.dashboard') }}</a></li>
        <li class="active">{{ trans('anan::anan.anan') }}</li>
    </ol>
@endsection

@section('content')
    <form method="POST" action="{{ route('admin.anan.settings.update') }}" class="form-horizontal" id="anan-settings-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}

        {!! $tabs->render(compact('settings')) !!}
    </form>
@endsection
