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
                @if($activeLang == $lang['id'])
                    <livewire:punchstation.wysiwyg wire:key="quill-editor-{{ $id . time() }}"
                                                   wire:model="{{ $replace($model, $lang['id']) }}" />
                @endif
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
