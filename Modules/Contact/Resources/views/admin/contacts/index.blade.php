@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('contact::contacts.contacts'))

    <li class="active">{{ trans('contact::contacts.contacts') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('resource', 'contacts')
    @slot('name', trans('contact::contacts.contacts'))

    @component('admin::components.table')
        @slot('thead')
            <tr>
                @include('admin::partials.table.select_all')
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th data-sort>{{ trans('admin::admin.table.date') }}</th>
            </tr>
        @endslot
    @endcomponent
@endcomponent

@push('scripts')
    <script>
        new DataTable('#contacts-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id',  },
                { data: 'name',  },
                { data: 'email',  },
                { data: 'phone',  },
                { data: 'is_reading',  searchable: false, render: function (data, type, full) {
                        if (data == true) {
                            return '<span class="dot green"></span>';
                        } else {
                           return '<span class="dot red"></span>'
                        };
                }},
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
@endpush
