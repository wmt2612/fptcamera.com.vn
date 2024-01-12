@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('review::reviews.reviews'))

    <li class="active">{{ trans('review::reviews.reviews') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @slot('resource', 'review_questions')
    @slot('buttons', ['create'])
    @slot('name', trans('review::reviews.review'))

    @slot('thead')
        <tr>
            @include('admin::partials.table.select_all')

            <th>{{ trans('admin::admin.table.id') }}</th>
            <th>{{ trans('review::review_questions.name') }}</th>
            <th data-sort>{{ trans('admin::admin.table.date') }}</th>
        </tr>
    @endslot
@endcomponent

@push('scripts')
    <script>
        new DataTable('#review_questions-table .table', {
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'name' },
                { data: 'created', name: 'created_at' },
            ],
        });
    </script>
@endpush
