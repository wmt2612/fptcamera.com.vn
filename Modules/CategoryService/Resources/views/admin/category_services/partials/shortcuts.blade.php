@push('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('admin::admin.shortcuts.back_to_index', ['name' => trans('categoryservice::category_services.category_service')]) }}</dd>
    </dl>
@endpush

@push('scripts')
    <script>
        keypressAction([
            { key: 'b', route: "{{ route('admin.category_services.index') }}" }
        ]);
    </script>
@endpush
