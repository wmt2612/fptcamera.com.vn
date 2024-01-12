<div class="row">
    <div class="col-md-8">
        {{ Form::select('rating', trans('review::attributes.rating'), $errors, array_combine(range(1, 5), range(1, 5)), $review, ['required' => true]) }}
        {{ Form::text('reviewer_name', trans('review::attributes.reviewer_name'), $errors, $review, ['required' => true]) }}
        {{ Form::text('reviewer_email', trans('review::attributes.reviewer_email'), $errors, $review, ['required' => true]) }}
        {{ Form::textarea('comment', trans('review::attributes.comment'), $errors, $review, ['required' => true]) }}

        <div class="form-group">
            <label for="comment_replay" class="col-md-3 control-label text-left">Replay</label>
            <div class="col-md-9">
                <textarea name="comment_replay" class="form-control " id="comment_replay" rows="10" cols="10">
                    {{ $review ? ($review->children ? $review->children->comment : '') : '' }}
                </textarea>
            </div>
        </div>
        {{ Form::checkbox('is_approved', trans('review::attributes.is_approved'), trans('review::reviews.form.approve_this_review'), $errors, $review) }}
    </div>
</div>
