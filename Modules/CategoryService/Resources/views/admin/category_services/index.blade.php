@extends('admin::layout')

@component('admin::components.page.header')
@slot('title', trans('categoryservice::category_services.category_services'))

<li class="active">{{ trans('categoryservice::category_services.category_services') }}</li>
@endcomponent

@section('content')
<div class="box box-default">
    <div class="box-body clearfix">
        <div class="col-lg-3 col-md-3">
            <div class="row">
                <button
                    class="btn btn-default add-root-categoryservice">{{ trans('categoryservice::category_services.tree.add_root_categoryservice') }}</button>
                <button
                    class="btn btn-default add-sub-categoryservice disabled">{{ trans('categoryservice::category_services.tree.add_sub_categoryservice') }}</button>

                <div class="m-b-10">
                    <a href="#" class="collapse-all">{{ trans('categoryservice::category_services.tree.collapse_all') }}</a> |
                    <a href="#" class="expand-all">{{ trans('categoryservice::category_services.tree.expand_all') }}</a>
                </div>

                <div class="categoryservice-tree"></div>
            </div>
        </div>

        <div class="col-lg-9 col-md-9">
            <div class="tab-wrapper categoryservice-details-tab">
                <ul class="nav nav-tabs">
                    <li class="general-information-tab active"><a data-toggle="tab"
                            href="#general-information">{{ trans('categoryservice::category_services.tabs.general') }}</a></li>

                    @hasAccess('admin.media.index')
                    <li class="image-tab"><a data-toggle="tab"
                            href="#image">{{ trans('categoryservice::category_services.tabs.image') }}</a></li>
                    @endHasAccess
                    <li class="intro-tab"><a data-toggle="tab" href="#intro">{{ trans('categoryservice::category_services.tabs.intro') }}</a>
                            </li>
                    <li class="seo-tab"><a data-toggle="tab"
                            href="#seo">{{ trans('categoryservice::category_services.tabs.seo') }}</a></li>
                </ul>

                <form method="POST" action="{{ route('admin.category_services.store') }}" class="form-horizontal"
                    id="categoryservice-form" novalidate>
                    {{ csrf_field() }}

                    <div class="tab-content">
                        <div id="general-information" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-8">
                                    <div id="id-field" class="hide">
                                        {{ Form::text('id', trans('categoryservice::attributes.id'), $errors, null, ['disabled' => true]) }}
                                    </div>

                                    {{ Form::text('name', trans('categoryservice::attributes.name'), $errors, null, ['required' => true]) }}
                                </div>
                            </div>
                        </div>

                        @if (auth()->user()->hasAccess('admin.media.index'))
                        <div id="image" class="tab-pane fade">
                            <div class="logo">
                                @include('media::admin.image_picker.single', [
                                'title' => trans('categoryservice::category_services.form.logo'),
                                'inputName' => 'files[logo]',
                                'file' => (object) ['exists' => false],
                                ])
                            </div>

                            <div class="banner">
                                @include('media::admin.image_picker.single', [
                                'title' => trans('categoryservice::category_services.form.banner'),
                                'inputName' => 'files[banner]',
                                'file' => (object) ['exists' => false],
                                ])
                            </div>
                        </div>
                        @endif

                        <div id="intro" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-12">
                                    {{ Form::wysiwyg('intro', trans('categoryservice::category_services.tabs.intro'), $errors, null, ['labelCol' => 2]) }}
                                </div>
                            </div>
                        </div>

                        <div id="seo" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="hide" id="slug-field">
                                        {{ Form::text('slug', trans('categoryservice::attributes.slug'), $errors, null, ['readonly' => 'readonly']) }}
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div>
                                        {{ Form::text('meta[meta_title]', trans('categoryservice::attributes.meta_title'), $errors) }}
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div>
                                        {{ Form::text('meta[meta_description]', trans('categoryservice::attributes.meta_description'), $errors) }}
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="form-categoryservice">
                        <div class="col-md-offset-2 col-md-10">
                            <button type="submit" class="btn btn-primary" data-loading>
                                {{ trans('admin::admin.buttons.save') }}
                            </button>

                            <button type="button" class="btn btn-link text-red btn-delete p-l-0 hide" data-confirm>
                                {{ trans('admin::admin.buttons.delete') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="overlay loader hide">
        <i class="fa fa-refresh fa-spin"></i>
    </div>
</div>
@endsection
