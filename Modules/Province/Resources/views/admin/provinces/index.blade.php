@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('province::provinces.provinces'))

    <li class="active">{{ trans('province::provinces.provinces') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'provinces')
    @slot('name', trans('province::provinces.province'))

    @component('admin::components.table')
        @slot('thead')
            <tr>
                @include('admin::partials.table.select_all')
                <th>{{ trans('admin::admin.table.id') }}</th>
                <th>{{ trans('post::posts.table.name') }}</th>
            </tr>
        @endslot
    @endcomponent
@endcomponent

@push('scripts')
    <script>
        new DataTable('#provinces-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'name', name: 'name', orderable: false, defaultContent: '' },
            ],
        });
    </script>
@endpush
