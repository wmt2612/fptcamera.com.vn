@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('post::posts.posts'))

    <li class="active">{{ trans('post::posts.posts') }}</li>
@endcomponent


@component('admin::components.page.index_table')
    @slot('buttons', ['create'])
    @slot('resource', 'posts')
    @slot('name', trans('post::posts.posts'))

    @component('admin::components.table')
        @slot('thead')
            <tr>
                @include('admin::partials.table.select_all')

                <th>{{ trans('admin::admin.table.id') }}</th>
                {{-- <th>Danh mục</th> --}}
                <th>{{ trans('post::posts.table.logo') }}</th>
                <th>{{ trans('post::posts.table.name') }}</th>
                <th>{{ trans('admin::admin.table.status') }}</th>
                <th data-sort>{{ trans('admin::admin.table.created') }}</th>
            </tr>
        @endslot
    @endcomponent
@endcomponent

@push('scripts')
    <script>
        new DataTable('#posts-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                // { data: 'groups', name: 'groups.name' },
                { data: 'logo', orderable: false, searchable: false, width: '10%' },
                { data: 'name', name: 'translations.name', orderable: false, defaultContent: '' },
                { data: 'status', name: 'is_active', searchable: false },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
@endpush
