<div id="options-group" class="sortable">
    <div class="content-accordion panel-group options-group-wrapper" id="option-0">
        <div class="panel panel-default option">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#seo" aria-expanded="true" class="no-underline relative overflow-hidden">
                        <span id="option-name" class="pull-left">Short Code</span>
                    </a>
                </h4>
            </div>

            <div id="seo" class="panel-collapse collapse in" aria-expanded="true">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label text-left">Choose shortcode</label>
                        <div class="col-md-9">
                            <select name="shortcode" class="form-control form-select">
                                <option value="">Select</option>
                                <option value="product_list">Product List</option>
                                <option value="single_product">Single Product</option>
                                <option value="info_register_form">Form Đăng Ký</option>
                            </select>
                        </div>
                    </div>

                    {{-- Product List Options --}}
                    <div id="options-product-list" style="display:none">
                        <div id="short_category_box">
                            {{ Form::select('shortcode_category_id', 'Category', $errors, $categories, null, [
                                'class' => 'selectize prevent-creation',
                                'multiple' => true,
                            ]) }}
                        </div>
                        <div id="shortcode_product_limit_box" style="display:none">
                            {{ Form::text('shortcode_product_limit', 'Limited Quantity', $errors, null, ['type' => 'number']) }}
                        </div>
                        <div id="shortcode_product_col_box" style="display:none">
                            {{ Form::text('shortcode_product_col', 'Item Per Row', $errors, null, ['type' => 'number', 'min' => 1]) }}
                        </div>
                    </div>

                    {{-- Single Product Options --}}
                    <div id="options-single-product" style="display:none">
                        {{ Form::text('shortcode_product_id', 'Product ID', $errors, null, ['type' => 'number']) }}
                        <div id="shortcode-single-product-desc" style="display:none">
                            {{ Form::textarea('shortcode_single_product_desc', 'Description', $errors, null) }}
                        </div>
                    </div>

                    {{-- Render shortcode --}}
                    <div id="render_shortcode" class="form-group" style="display:none">
                        <label class="col-md-3 control-label text-left">Render Shortcode</label>
                        <div class="col-md-9">
                            <input type="text" name="render_shortcode" class="form-control" readonly>
                        </div>
                        <div class="col-md-3 mt-3">
                            <button id="copyText" class="btn btn-primary">Copy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function(){
            let state = {
                shortcode: '',
                categoryIds: '',
                limit: 10,
                col: 5,
                productId: null,
                desc: ''
            };

            const $renderBox = $('#render_shortcode');
            const $renderInput = $('input[name=render_shortcode]');

            function generateShortcode() {
                let code = '';

                switch(state.shortcode) {
                    case 'product_list':
                        code = `[product_list category_ids="${state.categoryIds}" limit="${state.limit}" col="${state.col}"][/product_list]`;
                        break;

                    case 'single_product':
                        code = `[single_product id="${state.productId || ''}"${state.desc ? ` desc="${state.desc}"` : ''}][/single_product]`;
                        break;

                    default:
                        // fallback: nếu không có config → tự gen [shortcode][/shortcode]
                        if(state.shortcode) {
                            code = `[${state.shortcode}][/${state.shortcode}]`;
                        }
                        break;
                }

                $renderInput.val(code);
                code ? $renderBox.show('fast') : $renderBox.hide('fast');
            }

            // Chọn shortcode
            $('select[name=shortcode]').on('change', function(){
                state.shortcode = $(this).val();
                $('#options-product-list, #options-single-product').hide();

                if(state.shortcode === 'product_list') {
                    $('#options-product-list').show('fast');
                }
                if(state.shortcode === 'single_product') {
                    $('#options-single-product').show('fast');
                }
                generateShortcode();
            });

            // Product list
            $(document).on('change', "select[name='shortcode_category_id[]']", function(){
                state.categoryIds = $(this).val();
                $('#shortcode_product_limit_box').show('fast');
                generateShortcode();
            });

            $(document).on('change', "input[name=shortcode_product_limit]", function(){
                state.limit = $(this).val() || 10;
                $('#shortcode_product_col_box').show('fast');
                generateShortcode();
            });

            $(document).on('change', "input[name=shortcode_product_col]", function(){
                state.col = $(this).val() || 5;
                generateShortcode();
            });

            // Single product
            $(document).on('change', "input[name=shortcode_product_id]", function(){
                state.productId = $(this).val();
                $('#shortcode-single-product-desc').show('fast');
                generateShortcode();
            });

            $(document).on('change', "textarea[name=shortcode_single_product_desc]", function(){
                state.desc = encodeURI($(this).val());
                generateShortcode();
            });

            // Copy shortcode
            $("#copyText").click(function(e){
                e.preventDefault();
                navigator.clipboard.writeText($renderInput.val());
                $(this).text('Copied');
            });
        });
    </script>
@endpush
