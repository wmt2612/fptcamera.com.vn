@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('area::areas.areas'))

    <li class="active">{{ trans('area::areas.areas') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'areas')
    @slot('name', trans('area::areas.area'))

    @component('admin::components.table')
        @slot('thead')
            <tr>
                @include('admin::partials.table.select_all')
                <th>{{ trans('admin::admin.table.id') }}</th>
                <th>{{ trans('post::posts.table.name') }}</th>
                <th data-sort>{{ trans('admin::admin.table.created') }}</th>
            </tr>
        @endslot
    @endcomponent
@endcomponent

@push('scripts')
    <script>
        new DataTable('#areas-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'name', name: 'translations.name', orderable: false, defaultContent: '' },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
@endpush
