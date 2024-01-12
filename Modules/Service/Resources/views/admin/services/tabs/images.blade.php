
@include('media::admin.image_picker.single', [
    'title' => trans('service::services.form.base_image'),
    'inputName' => 'files[base_image]',
    'file' => $service->base_image,
])

<div class="media-picker-divider"></div>

@include('media::admin.image_picker.single', [
    'title' => trans('service::services.form.base_image_icon'),
    'inputName' => 'files[base_image_icon]',
    'file' => $service->base_image_icon,
])

<div class="media-picker-divider"></div>

@include('media::admin.image_picker.multiple', [
    'title' => trans('product::products.form.additional_images'),
    'inputName' => 'files[additional_images][]',
    'files' => $service->additional_images,
])
