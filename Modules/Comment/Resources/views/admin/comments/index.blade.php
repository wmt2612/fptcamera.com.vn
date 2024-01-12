@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('comment::comments.comments'))

    <li class="active">{{ trans('comment::comments.comments') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('resource', 'comments')
    @slot('name', trans('comment::comments.comment'))

    @slot('thead')
        <tr>
            @include('admin::partials.table.select_all')

            <th>{{ trans('admin::admin.table.id') }}</th>
            <th>{{ trans('comment::comments.table.name') }}</th>
            <th>{{ trans('comment::comments.table.email') }}</th>
            <th>{{ trans('comment::comments.table.approved') }}</th>
            <th data-sort>{{ trans('admin::admin.table.date') }}</th>
        </tr>
    @endslot
@endcomponent

@push('scripts')
    <script>
        new DataTable('#comments-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'name' },
                { data: 'email' },
                { data: 'is_approved', render: function(data, type, full){
                    return parseInt(data) == 1
                    ? '<span class="dot green"></span>'
                    : '<span class="dot red"></span>';
                } , searchable: false },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
@endpush
