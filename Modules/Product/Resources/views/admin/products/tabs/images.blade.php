
@include('media::admin.image_picker.single', [
    'title' => trans('product::products.form.base_image'),
    'inputName' => 'files[base_image]',
    'file' => $product->base_image,
])

@include('media::admin.image_picker.single', [
    'title' => trans('product::products.form.frame_image'),
    'inputName' => 'files[frame_image]',
    'file' => $product->frame_image,
])

@include('media::admin.image_picker.single', [
    'title' => trans('product::products.form.banner_image'),
    'inputName' => 'files[banner_image]',
    'file' => $product->banner_image,
])

{{-- <div class="media-picker-divider"></div>

@include('media::admin.image_picker.single', [
    'title' => trans('product::products.form.base_image'),
    'inputName' => 'files[base_image_2]',
    'file' => $product->base_image_2,
]) --}}

<div class="media-picker-divider"></div>

@include('media::admin.image_picker.multiple', [
    'title' => trans('product::products.form.additional_images'),
    'inputName' => 'files[additional_images][]',
    'files' => $product->additional_images,
])
