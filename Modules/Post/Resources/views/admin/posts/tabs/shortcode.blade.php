<div id="options-group" class="sortable">
    <div class="content-accordion panel-group options-group-wrapper" id="option-0">
        <div class="panel panel-default option">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" href="#seo" aria-expanded="true" class="" style="position: relative;
                                        text-decoration: none;
                                        overflow: hidden;">

                        <span id="option-name" class="pull-left">Short Code</span>
                    </a>
                </h4>
            </div>

            <div id="seo" class="panel-collapse collapse in" aria-expanded="true" style="">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="meta-title" class="col-md-3 control-label text-left">
                            Choose shortcode
                        </label>
                        <div class="col-md-9">
                            <select name="shortcode" class="form-control form-select">
                                <option value="">Select</option>
                                <option value="product_list">Product List</option>
                            </select>
                        </div>
                    </div>
                    <div style="display: none" id="short_category_box">
                        {{ Form::select('shortcode_category_id', 'Category', $errors, $categories, null, ['class' =>
                        'selectize prevent-creation', 'multiple' => true, ]) }}
                    </div>
                    <div style="display: none" id="shortcode_product_limit_box">
                        {{ Form::text('shortcode_product_limit', 'Limited Quantity', $errors, null,[
                            'type' => 'number'
                        ]) }}
                    </div>
                    <div style="display: none" id="shortcode_product_col_box">
                        {{ Form::text('shortcode_product_col', 'Item Per Row', $errors, null, [
                            'min' => 1,
                            'type' => 'number'
                        ]) }}
                    </div>
                    <div style="display: none" class="form-group" id="render_shortcode">
                        <label class="col-md-3 control-label text-left">
                            Render Shortcode
                        </label>
                        <div class="col-md-9">
                            <input type="text" name="render_shortcode" class="form-control" 
                                value="" readonly>
                        </div>
                        <div class="col-md-3" style="margin-top: 1rem">
                            <button id="copyText" class="btn btn-primary">Copy</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script type="text/javascript">
    let shortCode = '';
    let categoryIds = '';
    let limit = 10;
    let col = 5;

    $('select[name=shortcode]').change(function(e) {
        if($(this).val() == 'product_list') {
            $('#short_category_box').show('fast');
        }
    });

    $("select[name='shortcode_category_id[]']").change(function(e) {
        $('#shortcode_product_limit_box').show('fast');
        categoryIds = $(this).val();
        $('input[name=render_shortcode]').val(`[product_list category_ids="${categoryIds}" limit="${limit}"][/product_list]`);
    });

    $('input[name=shortcode_product_col]').change(function(e) {
            col = $(this).val();
            $('#shortcode_product_col_box').show('fast');
            $('#render_shortcode').show('fast');
            $('input[name=render_shortcode]').val(`[product_list category_ids="${categoryIds}" limit="${limit}" col="${col}"][/product_list]`);
    });

    $('input[name=shortcode_product_limit]').change(function(e) {
        if(typeof parseInt($(this).val()) === 'number') {
            limit = $(this).val();
            $('input[name=render_shortcode]').val(`[product_list category_ids="${categoryIds}" limit="${limit}" col="${col}"][/product_list]`);
            $('#shortcode_product_col_box').show('fast');
        }else {
            $('#render_shortcode').hide('fast');
        }
    });

  $("#copyText").click(function(e) {
        e.preventDefault();
        let $temp = $("<input>");
        $("body").append($temp);
        $temp.val($("input[name=render_shortcode]").val()).select();
        document.execCommand("copy");
        $(this).html('Copied');
        $temp.remove();
    })
</script>
@endpush