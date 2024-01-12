<div class="slide-options call-to-action-2">
    <h4>{{ trans("slider::sliders.slide.form.call_to_action") }} 2</h4>

    <div class="form-group">
        <div class="col-md-12 p-l-0">
            <label class="control-label col-lg-2 col-md-3 col-sm-3 col-xs-12 text-left p-l-0" for="call-to-action-2-delay">
                {{ trans("slider::attributes.call_to_action_delay") }}
            </label>

            <div class="col-lg-4 col-md-7 col-sm-6 col-xs-7 p-l-0">
                <input type="number"
                    name="slides[<%- slideNumber %>][options][call_to_action_2][delay]"
                    class="form-control"
                    id="call-to-action-2-delay"
                    placeholder="{{ trans('slider::sliders.slide.form.0_7s') }}"
                    value="<%- slide.options.call_to_action_2 ? slide.options.call_to_action_2.delay : '' %>"
                    step="0.01"
                >
            </div>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12 p-l-0">
            <label class="control-label col-lg-2 col-md-3 col-sm-3 col-xs-12 text-left p-l-0" for="call-to-action-2-effect">
                {{ trans("slider::attributes.call_to_action_effect") }}
            </label>

            <div class="col-lg-4 col-md-7 col-sm-6 col-xs-7 p-l-0">
                <select name="slides[<%- slideNumber %>][options][call_to_action_2][effect]"
                    class="form-control custom-select-black"
                    id="call-to-action-2-effect"
                >
                    @foreach (trans('slider::sliders.effects') as $effect => $name)
                        <option value="{{ $effect }}" <%= slide.options.call_to_action_2 ? (slide.options.call_to_action_2.effect === '{{ $effect }}' ? 'selected' : '') : '' %>>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
