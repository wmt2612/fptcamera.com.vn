
@include('media::admin.image_picker.single', [
    'title' => trans('user::attributes.users.avatar'),
    'inputName' => 'files[avatar]',
    'file' => $user->avatar,
])

{{ Form::wysiwyg('description', trans('user::attributes.users.description'), $errors, $user, ['required' => false]) }}
