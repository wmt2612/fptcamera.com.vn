@extends('admin::layout')

@component('admin::components.page.header')
@slot('title', trans('category::categories.categories'))

<li class="active">{{ trans('category::categories.categories') }}</li>
@endcomponent

@section('content')
<div class="box box-default">
    <div class="box-body clearfix">
        <div class="col-lg-3 col-md-3">
            <div class="row">
                <button
                    class="btn btn-default add-root-category">{{ trans('category::categories.tree.add_root_category') }}</button>
                <button
                    class="btn btn-default add-sub-category disabled">{{ trans('category::categories.tree.add_sub_category') }}</button>

                <div class="m-b-10">
                    <a href="#" class="collapse-all">{{ trans('category::categories.tree.collapse_all') }}</a> |
                    <a href="#" class="expand-all">{{ trans('category::categories.tree.expand_all') }}</a>
                </div>

                <div class="category-tree"></div>
            </div>
        </div>

        <div class="col-lg-9 col-md-9">
            <input type="hidden" name="over_image" id="over_image" class="image-picker-tiny">
            <div class="tab-wrapper category-details-tab">
                <ul class="nav nav-tabs">
                    <li class="general-information-tab active"><a data-toggle="tab"
                            href="#general-information">{{ trans('category::categories.tabs.general') }}</a></li>

                    @hasAccess('admin.media.index')
                    <li class="image-tab"><a data-toggle="tab"
                            href="#image">{{ trans('category::categories.tabs.image') }}</a></li>
                    @endHasAccess
                    <li class="intro-tab"><a data-toggle="tab"
                            href="#intro">{{ trans('category::categories.tabs.intro') }}</a>
                    </li>
                    <li class="seo-tab"><a data-toggle="tab"
                            href="#seo">{{ trans('category::categories.tabs.seo') }}</a></li>
                    <li class="slider-tab"><a data-toggle="tab"
                            href="#slider">{{ trans('category::categories.tabs.slider') }}</a></li>
                </ul>

                <form method="POST" action="{{ route('admin.categories.store') }}" class="form-horizontal"
                    id="category-form" novalidate>
                    {{ csrf_field() }}

                    <div class="tab-content">
                        <div id="general-information" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-8">
                                    <div id="id-field" class="hide">
                                        {{ Form::text('id', trans('category::attributes.id'), $errors, null, ['disabled' => true]) }}
                                    </div>

                                    {{ Form::text('name', trans('category::attributes.name'), $errors, null, ['required' => true]) }}
                                    {{ Form::checkbox('is_searchable', trans('category::attributes.is_searchable'), trans('category::categories.form.show_this_category_in_search_box'), $errors) }}
                                    {{ Form::checkbox('is_active', trans('category::attributes.is_active'), trans('category::categories.form.enable_the_category'), $errors) }}
                                </div>
                            </div>
                        </div>

                        @if (auth()->user()->hasAccess('admin.media.index'))
                        <div id="image" class="tab-pane fade">
                            <div class="logo">
                                @include('media::admin.image_picker.single', [
                                'title' => trans('category::categories.form.logo'),
                                'inputName' => 'files[logo]',
                                'file' => (object) ['exists' => false],
                                ])
                            </div>

                            <div class="banner">
                                @include('media::admin.image_picker.single', [
                                'title' => trans('category::categories.form.banner'),
                                'inputName' => 'files[banner]',
                                'file' => (object) ['exists' => false],
                                ])
                            </div>
                        </div>
                        @endif

                        <div id="intro" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-12">
                                    {{ Form::wysiwyg('intro', trans('category::categories.tabs.intro'), $errors, null, ['labelCol' => 2]) }}
                                </div>
                            </div>
                        </div>

                        <div id="seo" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="hide" id="slug-field">
                                        {{ Form::text('slug', trans('category::attributes.slug'), $errors, null) }}
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div>
                                        {{ Form::text('meta[meta_title]', trans('category::attributes.meta_title'), $errors) }}
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div>
                                        {{ Form::text('meta[meta_keyword]', trans('category::attributes.meta_keyword'), $errors) }}
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div>
                                        {{ Form::textarea('meta[meta_description]', trans('category::attributes.meta_description'), $errors) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="slider" class="tab-pane fade">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="slider_id" class="col-md-3 control-label text-left">{{ trans('category::attributes.slider') }}</label>
                                        <div class="col-md-9">
                                            <select name="slider_id"
                                                class="form-control custom-select-black " id="slider_id">
                                                <option value="">-- Select Slider --</option>
                                                @foreach ($sliders as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
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
@push('scripts')
    <script>
        function callAjax(name, category_id)
        {
            const url = route('admin.categories.ajax.slug');
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    name,
                    category_id
                },
                success: function (response) {
                    $('#slug').val(response);
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
        $(document).ready(function(){
            $("#slug").on('change', function () {
                const name = $(this).val();
                const id = $('#id').val() ?? 0;
                callAjax(name, id);
            });
        });
    </script>
@endpush
