<div class="row">
    <div class="col-md-8">

    	{{ Form::select('blogcategory_slider', 'Slider', $errors, $blogcategory_slider, $settings) }}

    	<div class="media-picker-divider"></div>

        {{ Form::select('blogcategory_main1', 'Main 1', $errors, $blogcategory_main1, $settings) }}
        {{ Form::select('blogcategory_main2', 'Main 2', $errors, $blogcategory_main2, $settings) }}
        {{ Form::select('blogcategory_main3', 'Main 3', $errors, $blogcategory_main3, $settings) }}
        {{ Form::select('blogcategory_main4', 'Main 4', $errors, $blogcategory_main4, $settings) }}

        <div class="media-picker-divider"></div>

        {{ Form::select('blogcategory_sidebar1', 'Sidebar 1', $errors, $blogcategory_sidebar1, $settings) }}
        {{ Form::select('blogcategory_sidebar2', 'Sidebar 2', $errors, $blogcategory_sidebar2, $settings) }}
        {{ Form::select('blogcategory_sidebar3', 'Sidebar 3', $errors, $blogcategory_sidebar3, $settings) }}
    </div>
</div>