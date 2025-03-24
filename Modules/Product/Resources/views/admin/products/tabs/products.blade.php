@component('admin::components.table')
    @slot('thead')
        @include('product::admin.products.partials.thead')
    @endslot
@endcomponent

@push('scripts')
    <script>
        @php
            $tab = 'default';
        @endphp

         @if ($name === 'related_products')
             @php
                $rProducts = array_map('intval', $product->relatedProductList()->toArray());
                $tab = 'related_products';
            @endphp
            DataTable.setSelectedIds('#related_products .table', {!! old_json('related_products', $rProducts) !!});
        @elseif ($name === 'up_sells')
             @php
                $usProducts = array_map('intval', $product->upSellProductList()->toArray());
                $tab = 'up_sells';
            @endphp
            DataTable.setSelectedIds('#up_sells .table', {!! old_json('up_sells', $usProducts) !!});
        @elseif ($name === 'cross_sells')
             @php
                $csProducts = array_map('intval', $product->crossSellProductList()->toArray());
                $tab = 'cross_sells';
            @endphp
            DataTable.setSelectedIds('#cross_sells .table', {!! old_json('cross_sells', $csProducts) !!});
        @elseif ($name === 'same_version_products')
      	    @php
                $svProducts = array_map('intval', $product->sameVersionProductList()->toArray());
                $tab = 'same_version_products';
            @endphp
            DataTable.setSelectedIds('#same_version_products .table', {!! old_json('same_version_products', $svProducts) !!});
        @endif

        DataTable.setRoutes('#{{ $name }} .table', {
            index: { name: 'admin.products.index', params: { except: {!! $product->id ?? "''" !!}, tab: {!! json_encode($tab) !!} } },
            edit: 'admin.products.edit',
            destroy: 'admin.products.destroy',
        });

        new DataTable('#{{ $name }} .table', {
            pageLength: 10,
            columns: [
                { data: 'checkbox', orderable: false, searchable: false, width: '3%' },
                { data: 'id', width: '5%' },
                { data: 'thumbnail', orderable: false, searchable: false, width: '10%' },
                { data: 'name', name: 'translations.name', orderable: false, defaultContent: '' },
                { data: 'price', searchable: false },
                { data: 'status', name: 'is_active', searchable: false },
                { data: 'created', name: 'created_at' },
            ],
        });
      
    </script>
@endpush
