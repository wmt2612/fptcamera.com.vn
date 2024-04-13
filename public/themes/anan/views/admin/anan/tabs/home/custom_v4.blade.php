<div class="row">
    <div class="col-md-8">
        {{ Form::text('translatable[home_custom_v4_title]', 'Title', $errors, $settings) }}
        {{ Form::text('translatable[home_custom_v4_desc]', 'Description', $errors, $settings) }}
        {{ Form::select('home_custom_v4_category', 'Category', $errors, $categories, $settings, ['class' => 'selectize prevent-creation', 'multiple' => true]) }}
        {{ Form::select('home_custom_v4_get_item_by', 'Get By', $errors, $itemTypes, $settings) }}
        {{ Form::select('home_custom_v4_sort_type', 'Sort By', $errors, $sortTypes, $settings) }}
        {{ Form::text('home_custom_v4_item_limit', 'Limited Quantity', $errors, $settings) }}
        {{ Form::text('home_custom_v4_view_more_link', 'View More URL', $errors, $settings) }}
        {{ Form::text('translatable[home_custom_v4_view_more_title]', 'View More Title', $errors, $settings) }}
        {{ Form::checkbox('home_custom_v4_is_active', 'Status' , 'Enable this section' , $errors, $settings) }}
    	<div class="media-picker-divider"></div>
    </div>
</div>