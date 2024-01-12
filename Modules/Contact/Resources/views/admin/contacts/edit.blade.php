@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('contact::contacts.contacts')]))
    @slot('subtitle', '')

    <li><a href="{{ route('admin.contacts.index') }}">{{ trans('contact::contacts.contacts') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('contact::contacts.contacts')]) }}</li>
@endcomponent

@section('content')
    <form style="background-color: white; padding-left: 20px; padding-top:20px; padding-right:20px; padding-bottom: 40px" method="POST" action="{{ route('admin.contacts.update', $contacts) }}" class="form-horizontal" id="contacts-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="form-group">
            <label for="name" class="col-md-2 control-label text-left">Name
                <span class="m-l-5 text-red">*</span>
            </label>
            <div class="col-md-9">
                <input type="hidden" name="name" value="{{ $contacts->name }}" class="form-control" disabled>
                <p style="margin-top: 10px">{{ $contacts->name }}</p>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-md-2 control-label text-left">Email
                <span class="m-l-5 text-red">*</span>
            </label>
            <div class="col-md-9">
                <input type="hidden" name="email" value="{{ $contacts->email }}" class="form-control" disabled>
                <p style="margin-top: 10px">{{ $contacts->email }}</p>
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-md-2 control-label text-left">Phone
                <span class="m-l-5 text-red">*</span>
            </label>
            <div class="col-md-9">
                <input type="hidden" name="phone" value="{{ $contacts->phone }}" class="form-control" disabled>
                <p style="margin-top: 10px">{{ $contacts->phone }}</p>
            </div>
        </div>
        <div class="form-group">
            <label for="content" class="col-md-2 control-label text-left">Content</label>
            <div class="col-md-9">
                <textarea hidden name="content" class="form-control " id="content" rows="10" cols="10" >{{ $contacts->content }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="is_reading" class="col-md-2 control-label text-left">Trạng thái</label>
            <div class="col-md-9">
                <div class="checkbox">
                    <input type="hidden" value="0" name="is_reading">
                    <input type="checkbox" name="is_reading" @if($contacts->is_reading == 1)
                        checked
                    @endif class="" id="is_reading" value="1">
                    <label for="is_reading">Đã liên hệ.</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="is_reading" class="col-md-2 control-label text-left"></label>
            <div class="col-md-9">
                <div class="checkbox">
                    <button type="submit" class="btn btn-primary text-content">Save</button>
                </div>
            </div>
        </div>
    </form>
@endsection

@include('contact::admin.contacts.partials.shortcuts')
