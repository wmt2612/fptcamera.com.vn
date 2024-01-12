@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('service::services.services'))

    <li class="active">{{ trans('service::services.services') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'services')
    @slot('name', trans('service::services.service'))

    @component('admin::components.table')
        @slot('thead')
            <tr>
                @include('admin::partials.table.select_all')
            </tr>
            @include('service::admin.services.partials.thead', ['name' => 'services-index'])
        @endslot
    @endcomponent
@endcomponent

@push('scripts')
    <script>
        new DataTable('#services-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'thumbnail', orderable: false, searchable: false, width: '10%' },
                { data: 'name', name: 'translations.name', orderable: false, defaultContent: '' },
                { data: 'price', searchable: false },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
@endpush
