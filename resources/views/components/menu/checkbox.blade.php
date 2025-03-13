<label for="{{ $model }}" class="menu__item menu__item--checkbox">
    <svg>
        <use xlink:href="{{ asset("images/sprite.svg#check") }}"></use>
    </svg>

    <span>
        {{ $slot }}
    </span>

    <input id="{{ $model }}" type="checkbox" value="{{ $value }}" wire:model.live="{{ $model }}" class="menu__item__input" />
</label>