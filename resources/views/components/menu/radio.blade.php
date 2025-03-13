<label for="{{ "{$model}.{$value}" }}" class="menu__item menu__item--radio">
    <svg>
        <use xlink:href="{{ asset("images/sprite.svg#check") }}"></use>
    </svg>

    <span>
        {{ $slot }}
    </span>

    <input id="{{ "{$model}.{$value}" }}" type="radio" value="{{ $value }}" wire:model.live="{{ $model }}" class="menu__item__input" />
</label>