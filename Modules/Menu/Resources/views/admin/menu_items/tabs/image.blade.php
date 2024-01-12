@include('media::admin.image_picker.single', [
    'title' => trans('menu::menu_items.form.background_image'),
    'inputName' => 'files[background_image]',
    'file' => $menuItem->backgroundImage,
])

@include('media::admin.image_picker.single', [
    'title' => trans('menu::menu_items.form.background_image'),
    'inputName' => 'files[background_image_2]',
    'file' => $menuItem->backgroundImage2,
])
