
@include('media::admin.image_picker.single', [
    'title' => trans('lecturer::lecturers.form.base_image'),
    'inputName' => 'files[base_image]',
    'file' => $lecturer->base_image,
])
