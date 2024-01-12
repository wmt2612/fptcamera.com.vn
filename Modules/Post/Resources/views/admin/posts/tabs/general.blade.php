{{ Form::text('name', null, $errors, $post, ['labelCol' => 0, 'placeholder' => "Add Title"]) }}
{{-- {{ Form::wysiwyg('content', null, $errors, $post, ['labelCol' => 0]) }} --}}
@include('post::admin.posts.sections.ckeditor', [
    'content' => $post->content
])
