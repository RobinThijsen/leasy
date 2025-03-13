<div class="menu__item menu__item--sub" wire:dropdown-submenu>
    <span>
        {{ $heading }}
    </span>
    <svg>
        <use xlink:href="{{ asset('images/sprite.svg#arrow-down') }}"></use>
    </svg>

    <div class="menu__item__absolute" wire:dropdown-absolute>
        {{ $slot }}
    </div>
</div>