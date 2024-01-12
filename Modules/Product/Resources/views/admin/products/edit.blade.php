@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('product::products.product')]))
    @slot('subtitle', $product->name)

    <li><a href="{{ route('admin.products.index') }}">{{ trans('product::products.products') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('product::products.product')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.products.update', $product) }}" class="form-horizontal" id="product-edit-form" novalidate>
        {{ csrf_field() }}
        {{ method_field('put') }}

        {!! $tabs->render(compact('product')) !!}
    </form>
@endsection

@include('product::admin.products.partials.shortcuts')
@push('scripts')
      <script>
            $(document).ready(function() {
                $('#product-edit-form').on('click', '#same_version_products input[type=checkbox]', function(e) {
                    setTimeout(() => {
                        window.form.appendHiddenInputs('#product-create-form, #product-edit-form', 'same_version_products', DataTable.getSelectedIds('#same_version_products .table'));
                        console.log(DataTable.getSelectedIds('#same_version_products .table'));
                    }, 1000);
                });
              
                 $('#btnReplicateProduct').click(function(e) {
                    e.preventDefault();
                    if(confirm('Are you sure you want to copy this product ?') === true) {
                        $('#product-edit-form').attr('action', route('admin.products.store'));
                        $('#product-edit-form input[name=_method]').remove();
                        $('#product-edit-form input[name=name]').val($('#product-edit-form input[name=name]').val() + ' #' + new Date().getTime());
                        $('#product-edit-form input[name=slug]').val('');
                        $('#product-edit-form input[name=is_active]').val(0);
                        $('#product-edit-form input[name=created_at]').remove();
                        $('#product-edit-form').submit();
                    }
                })
            })
           
        </script>
@endpush

