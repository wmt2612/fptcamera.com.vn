<tr>
    @include('admin::partials.table.select_all')

    <th>{{ trans('admin::admin.table.id') }}</th>
    <th>{{ trans('service::services.table.thumbnail') }}</th>
    <th>{{ trans('service::services.table.name') }}</th>
    <th>{{ trans('service::services.table.price') }}</th>
    <th data-sort>{{ trans('admin::admin.table.created') }}</th>
</tr>
