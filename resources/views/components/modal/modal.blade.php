@teleport('body')
<div class="modal {{ $class }} @if (!empty($variant)) modal--{{ $variant }} @endif"
     wire:ignore.self
     wire:modal="{{ $name }}"
     @if(!empty($variant)) wire:modal-variant="{{ $variant }}" @endif
     x-cloak>
    @if (empty($variant))
        <div class="modal__heading">
            <h5 class="modal__heading__title">
                @if ($title)
                    {{ $title }}
                @endif
            </h5>

            <button type="button" title="{{ __('punchstation.buttons.modal.close.title') }}" class="button button--icon modal__heading__close" wire:modal-trigger="{{ $name }}">
                <svg>
                    <use xlink:href="{{ asset('images/sprite.svg#close') }}"></use>
                </svg>
            </button>
        </div>
    @endif

    <div class="modal__content">
        {{ $slot }}
    </div>
</div>
@endteleport
