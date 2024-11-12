@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('autolink::auto_links.auto_links'))

    <li class="active">{{ trans('autolink::auto_links.auto_links') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'auto_links')
    @slot('name', trans('autolink::auto_links.auto_link'))

    @component('admin::components.table')
        @slot('thead')
            <tr>
                @include('admin::partials.table.select_all')
                <th>{{ trans('autolink::auto_links.table.id') }}</th>
                <th>{{ trans('autolink::auto_links.table.title') }}</th>
                <th>{{ trans('autolink::auto_links.table.target_url') }}</th>
                <th>{{ trans('autolink::auto_links.table.status') }}</th>
            </tr>
        @endslot
    @endcomponent
@endcomponent

@push('scripts')
    <script>
        new DataTable('#auto_links-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', orderable: false, searchable: false },
                { data: 'title', name: 'translations.title', orderable: false, searchable: true, defaultContent: '' },
                { data: 'target_url', orderable: false, searchable: true },
                { data: 'status', name: 'is_active', orderable: false, searchable: false },
            ],
        });
    </script>
@endpush
