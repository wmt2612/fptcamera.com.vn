@include('media::admin.image_picker.single', [
    'title' => trans('post::posts.form.logo'),
    'inputName' => 'files[logo]',
    'file' => $post->logo,
])

<div class="media-picker-divider"></div>
