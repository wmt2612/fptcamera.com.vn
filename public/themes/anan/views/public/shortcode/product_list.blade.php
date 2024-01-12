@if($shortcode->col  > 0)
    <style>
        @media (min-width: 767px) {
            #az-product-list-{{ $id }} .az-product-item {
                max-width: {{ 100 / $shortcode->col  }}% ;
                flex: 0 0 {{ 100 / $shortcode->col  }}% ;
            }
        }
      
    </style>
@endif
<div class="row az-home-row-product az-section" id="az-product-list-{{ $id }}">
      <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="top" role="tabpanel"
                    aria-labelledby="top-tab">
                    <div class="az-content">
                        @foreach ($products as $item)
                        @include('public.product.partials.item_v1', [
                            'itemCol' => $shortcode->col 
                        ])
                        @endforeach
                    </div>
          </div>
    </div>
</div>