<div class="row">
    <div class="col-md-8">
        {{ Form::text('translatable[anan_navbar_text]', trans('anan::attributes.anan_navbar_text'), $errors, $settings) }}
        {{ Form::select('anan_primary_menu', trans('anan::attributes.anan_primary_menu'), $errors, $menus, $settings) }}
        {{ Form::select('anan_category_menu', trans('anan::attributes.anan_category_menu'), $errors, $menus, $settings) }}
        {{ Form::text('translatable[anan_footer_menu_one_title]', trans('anan::attributes.anan_footer_menu_one_title'), $errors, $settings) }}
        {{ Form::select('anan_footer_menu_one', trans('anan::attributes.anan_footer_menu_one'), $errors, $menus, $settings) }}
        {{ Form::text('translatable[anan_footer_menu_two_title]', trans('anan::attributes.anan_footer_menu_two_title'), $errors, $settings) }}
        {{ Form::select('anan_footer_menu_two', trans('anan::attributes.anan_footer_menu_two'), $errors, $menus, $settings) }}
        {{ Form::select('home_v2_top_menu', 'New Top Menu', $errors, $menus, $settings) }}
    </div>
</div>
