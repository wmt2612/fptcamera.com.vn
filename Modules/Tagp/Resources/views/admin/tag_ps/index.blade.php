@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('tagp::tag_ps.tag_ps'))

    <li class="active">{{ trans('tagp::tag_ps.tag_ps') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'tag_ps')
    @slot('name', trans('tagp::tag_ps.tag_p'))

    @component('admin::components.table')
        @slot('thead')
            <tr>
                @include('admin::partials.table.select_all')
                <th>{{ trans('admin::admin.table.id') }}</th>
                <th>{{ trans('tag::tags.table.name') }}</th>
                <th data-sort>{{ trans('admin::admin.table.created') }}</th>
            </tr>
        @endslot
    @endcomponent
@endcomponent

@push('scripts')
    <script>
        new DataTable('#tag_ps-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'name', name: 'translations.name', orderable: false, defaultContent: '' },
                { data: 'created', name: 'created_at', width: '30%' },
            ],
        });
    </script>
@endpush
