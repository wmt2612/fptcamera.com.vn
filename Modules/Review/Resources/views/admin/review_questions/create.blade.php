@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('review::review_questions.review_question')]))

    <li><a href="{{ route('admin.review_questions.index') }}">{{ trans('review::review_questions.review_questions') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('review::review_questions.review_question')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.review_questions.store') }}" class="form-horizontal" id="page-create-form" novalidate>
        {{ csrf_field() }}

        {!! $tabs->render(compact('reviewQuestion')) !!}
    </form>
@endsection

