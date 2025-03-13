<div class="translatable">
    <div class="fields">
        <div class="form-group form-group--wysiwyg @error($model)is-invalid @enderror">
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

            @foreach($langs as $lang)
                <input id=" {{ $replace($id, $lang['id']) }}"
                       name="{{ $replace($id, $lang['id']) }}"
                       type="{{ $type }}"
                       @if($required)required @endif
                       @if($activeLang != $lang['id'])class="hidden" @endif
                       {{$modelKey}}="{{ $replace($model, $lang['id']) }}" />
            @endforeach

            @error($model)
                <span class="text-danger">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>

    <x-form.translatable.selector />
</div>
