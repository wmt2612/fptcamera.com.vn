<div class="row">
    <div class="col-md-8">
        {{ Form::text('name', trans('comment::attributes.name'), $errors, $comment, ['required' => true]) }}
        {{ Form::text('email', trans('comment::attributes.email'), $errors, $comment, ['required' => true]) }}
        <div class="form-group">
            <label for="image" class="col-md-3 control-label text-left">commenter Image
                <span class="m-l-5 text-red">*</span>
            </label>
            <div class="col-md-9">
                <img width="100px" src="{{ asset($comment->image) }}" alt="">
                <input type="hidden" name="image" value="{{ $comment->image }}">
            </div>
        </div>
        <div class="form-group">
            <label for="image" class="col-md-3 control-label text-left">Gender
                <span class="m-l-5 text-red">*</span>
            </label>
            <div class="col-md-9">
                <input type="text" value="@if($comment->gender == 0) Nữ @else Nam @endif" class="form-control" disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="image" class="col-md-3 control-label text-left">Product
                <span class="m-l-5 text-red">*</span>
            </label>
            <div class="col-md-9">
                <input type="text" value="{{ $comment->product->name ?? ''}}" class="form-control" disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="image" class="col-md-3 control-label text-left">Post
                <span class="m-l-5 text-red">*</span>
            </label>
            <div class="col-md-9">
                <input type="text" value="{{ $comment->post->name ?? '' }}" class="form-control" disabled>
            </div>
        </div>
        {{ Form::textarea('comment', trans('comment::attributes.comment'), $errors, $comment, ['required' => true]) }}
        {{ Form::checkbox('is_approved', trans('comment::attributes.is_approved'), trans('comment::comments.form.approve_this_comment'), $errors, $comment) }}
    </div>
</div>
