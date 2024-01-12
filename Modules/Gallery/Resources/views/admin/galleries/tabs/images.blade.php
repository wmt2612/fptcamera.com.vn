@include('media::admin.image_picker.multiple', [
    'title' => trans('gallery::galleries.form.additional_images'),
    'inputName' => 'files[additional_images][]',
    'files' => $gallery->additional_images,
])
