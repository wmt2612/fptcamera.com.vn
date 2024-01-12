@include('media::admin.image_picker.single', [
    'title' => trans('anan::anan.form.favicon'),
    'inputName' => 'anan_favicon',
    'file' => $favicon,
])

<div class="media-picker-divider"></div>

@include('media::admin.image_picker.single', [
    'title' => trans('anan::anan.form.header_logo'),
    'inputName' => 'translatable[anan_header_logo]',
    'file' => $headerLogo,
])

<div class="media-picker-divider"></div>

@include('media::admin.image_picker.single', [
    'title' => trans('anan::anan.form.mail_logo'),
    'inputName' => 'translatable[anan_mail_logo]',
    'file' => $mailLogo,
])

<div class="media-picker-divider"></div>

@include('media::admin.image_picker.single', [
    'title' => 'Mobile Header Logo',
    'inputName' => 'translatable[anan_mobile_header_logo]',
    'file' => $mobileHeaderLogo,
])