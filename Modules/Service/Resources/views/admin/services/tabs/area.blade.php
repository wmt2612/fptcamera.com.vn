@foreach ($areas as $key => $area)
    <div class="row">
        <div class="col-md-8">
            <input type="hidden" name="areas[]" value="{{ $area->id }}">
            <div class="form-group">
                <label for="price_area[]" class="col-md-3 control-label text-left">{{ $area->name }}</label>
                <div class="col-md-9">
                    <input name="price_area[]" class="form-control " id="price_area[]"
                        value="{{ $service->areas[$key]->pivot->price_area ?? "" }}" min="0" type="number">
                </div>
            </div>
        </div>
    </div>
@endforeach
