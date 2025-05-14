@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('product::products.product')]))
    @slot('subtitle', $product->name)

    <li><a href="{{ route('admin.products.index') }}">{{ trans('product::products.products') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('product::products.product')]) }}</li>
@endcomponent

@push('styles')
    <style>
        .datetime-wrapper {
            position: relative;
            width: 100%;
        }

        .remove-icon {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 35px;
            color: red;
            display: none;
        }
    </style>
@endpush

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
                });

                $('.datetime-picker[type="text"]').each(function () {
                    // Bọc input và thêm icon
                    const $input = $(this);
                    $input.wrap('<div class="datetime-wrapper"></div>');
                    const $wrapper = $input.parent();
                    const $removeIcon = $('<span class="remove-icon">&times;</span>'); // dấu x

                    $wrapper.append($removeIcon);

                    const $hiddenInput = $input.closest('.form-group').find('input.datetime-picker[type="hidden"]');

                    // Click vào icon để xoá
                    $removeIcon.on('click', function () {
                        $input.val('');
                        $hiddenInput.val('');
                        $removeIcon.hide();
                        $input.focus();
                    });

                    // Nếu có sẵn giá trị thì hiện icon
                    if ($input.val()) {
                        $removeIcon.show();
                    }
                });

                $('.form-group').has('input.datetime-picker[type="text"]').each(function () {
                    const $wrapper = $(this);
                    const $visibleInput = $wrapper.find('input.datetime-picker[type="text"]');
                    const $hiddenInput = $wrapper.find('input.datetime-picker[type="hidden"]');
                    const $removeIcon = $wrapper.find('.remove-icon');

                    const handleChange = () => {
                        if ($hiddenInput.val()) {
                            $removeIcon.show();
                        } else {
                            $removeIcon.hide();
                        }
                    };

                    // Gắn sự kiện khi input hidden (giá trị thực) thay đổi
                    $hiddenInput.on('change', handleChange);

                });
            });
      </script>
@endpush

