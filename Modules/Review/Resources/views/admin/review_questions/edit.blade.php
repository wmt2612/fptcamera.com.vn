@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('review::review_questions.review_question')]))

        <li><a href="{{ route('admin.review_questions.index') }}">{{ trans('review::review_questions.review_questions') }}</a></li>
        <li class="active">
            {{ trans('admin::resource.edit', ['resource' => trans('review::review_questions.review_question')]) }}</li>
    @endcomponent

    @section('content')
        <form method="POST" action="{{ route('admin.review_questions.update', $review_question) }}" class="form-horizontal" id="page-edit-form"
            novalidate>
            {{ csrf_field() }}
            {{ method_field('put') }}

            {!! $tabs->render(compact('review_question')) !!}
        </form>
    @endsection