<div class="row">
    @foreach ($review_questions as $question)
        <div class="form-group">
            <div class="col-md-1">
                <div class="checkbox">
                    <input type="checkbox" 
                    @if($product->review_questions_id != null)
                    {{ in_array("$question->id", json_decode($product->review_questions_id, true)) ? 'checked' : ''}} 
                    @endif
                    name="review_questions_id[]" class="" id="review_questions_{{$question->id}}" value="{{ $question->id }}">
                    <label for="review_questions_{{$question->id}}"></label>
                </div>
            </div>
            <label for="review_questions_{{$question->id}}" class="col-md-11 control-label text-left">{{ $question->name }}</label>
            
        </div>
    @endforeach
</div>
