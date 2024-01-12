@include('media::admin.image_picker.single', [
    'title' => trans('anan::anan.form.newsletter_bg_image'),
    'inputName' => 'anan_newsletter_bg_image',
    'file' => $newsletterBgImage,
])
