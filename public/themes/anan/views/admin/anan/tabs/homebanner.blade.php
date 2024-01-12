<div class="box-content">

    @include('media::admin.image_picker.single', [
	    'title' => 'Banner #01',
	    'inputName' => 'translatable[homebanner01]',
	    'file' => $homebanner01,
	])

    {{ Form::text('translatable[homebanner01_url]', 'URL', $errors, $settings) }}
</div>



<div class="media-picker-divider"></div>

<div class="box-content">

    @include('media::admin.image_picker.single', [
	    'title' => 'Banner #02',
	    'inputName' => 'translatable[homebanner02]',
	    'file' => $homebanner02,
	])

    {{ Form::text('translatable[homebanner02_url]', 'URL', $errors, $settings) }}
</div>
