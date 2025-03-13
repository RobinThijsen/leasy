<div class="form-group form-group--radio @error($model)is-invalid @enderror">
    <input type="radio"
           id="{{ $id }}"
           {{ $attributes }}
           @if ($required)required @endif />

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

    @error($model)
    <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>