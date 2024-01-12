@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('gallery::galleries.galleries'))

    <li class="active">{{ trans('gallery::galleries.galleries') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'galleries')
    @slot('name', trans('gallery::galleries.gallery'))

    @component('admin::components.table')
        @slot('thead')
            <tr>
                @include('admin::partials.table.select_all')
                <th>{{ trans('gallery::galleries.table.id') }}</th>
                <th>{{ trans('gallery::galleries.table.name') }}</th>
                {{-- <th>{{ trans('gallery::galleries.table.description') }}</th> --}}
            </tr>
        @endslot
    @endcomponent
@endcomponent

@push('scripts')
    <script>
        new DataTable('#galleries-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'name', name: 'name', orderable: false, defaultContent: '' },
                // { data: 'description', name: 'description', orderable: false, defaultContent: '' },
            ],
        });
    </script>
@endpush
