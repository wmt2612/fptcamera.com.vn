@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('product::products.product')]))

    <li><a href="{{ route('admin.products.index') }}">{{ trans('product::products.products') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('product::products.product')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.products.store') }}" class="form-horizontal" id="product-create-form" novalidate>
        {{ csrf_field() }}

        {!! $tabs->render(compact('product')) !!}
    </form>
@endsection

@include('product::admin.products.partials.shortcuts')
@push('scripts')
      <script>
            $(document).ready(function() {
                $('#product-create-form').on('click', '#same_version_products input[type=checkbox]', function(e) {
                    setTimeout(() => {
                        window.form.appendHiddenInputs('#product-create-form, #product-edit-form', 'same_version_products', DataTable.getSelectedIds('#same_version_products .table'));
                        console.log(DataTable.getSelectedIds('#same_version_products .table'));
                    }, 1000);
                });
            })
           
        </script>
@endpush
