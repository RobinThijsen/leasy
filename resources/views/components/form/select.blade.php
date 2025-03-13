<div class="form-group form-group--select @error($model) has-error @enderror">
    @if (!empty($label))
        <label for="{{ $id }}" class="@if(!empty($tip))has-tip @endif">
            <span>
                {!! $label !!}

                @if($required)
                    <sup>*</sup>
                @endif
            </span>

            @if(!empty($tip))
                <span wire:tip.top="{!! $tip !!}" class="tooltip">
                    <svg class="tip__icon">
                        <use xlink:href="{{ asset('images/sprite.svg#tip') }}"></use>
                    </svg>
                </span>
            @endif
        </label>
    @endif

    <select id="{{ $id }}"
            {{ $attributes }}
            class="{{ $class }}">

        <option value="" @if($required)disabled @endif>
            @if($required) {{ __('punchstation.fields.default') }} @endif
        </option>

        {!! $options !!}
    </select>

    @if (!$attributes->has('multiple'))
        <svg>
            <use xlink:href="{{ asset('images/sprite.svg#arrow-triangle') }}"></use>
        </svg>
    @endif

    @error($model)
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>
