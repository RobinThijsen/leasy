@if ($type == \App\View\Components\Menu\Item::BUTTON)
    <button type="button" wire:click.prevent="{{ $action }}"
            title="{{ $title }}"
            class="menu__item menu__item--{{ $variant }}">
        @if (!empty($icon))
            <svg>
                <use xlink:href="{{ asset("images/sprite.svg#{$icon}") }}"></use>
            </svg>
        @endif
        <span>
            {{ $slot }}
        </span>
    </button>
@elseif ($type == \App\View\Components\Menu\Item::LINK)
    <a href="{{ $href }}" title="{{ $title }}" @if($target)target="{{ $target }}" @endif
       class="menu__item menu__item--{{ $variant }}" @if($downloadable)download @endif>
        @if (!empty($icon))
            <svg>
                <use xlink:href="{{ asset("images/sprite.svg#{$icon}") }}"></use>
            </svg>
        @endif
        <span>
            {{ $slot }}
        </span>
    </a>
@elseif ($type == \App\View\Components\Menu\Item::DOWNLOAD)
    <a href="{{ $href }}" title="{{ $title }}" download
       class="menu__item menu__item--{{ $variant }}" @if($downloadable)download @endif>
        @if (!empty($icon))
            <svg>
                <use xlink:href="{{ asset("images/sprite.svg#{$icon}") }}"></use>
            </svg>
        @endif
        <span>
            {{ $slot }}
        </span>
    </a>
@elseif ($type == \App\View\Components\Menu\Item::MODAL)
    <x-modal.trigger name="{{ $name }}" title="{{ $title }}"
                     class="menu__item menu__item--{{ $variant }}">
        @if (!empty($icon))
            <svg>
                <use xlink:href="{{ asset("images/sprite.svg#{$icon}") }}"></use>
            </svg>
        @endif

        <span>
            {{ $slot }}
        </span>
    </x-modal.trigger>
@elseif ($type == \App\View\Components\Menu\Item::LOGOUT)
    <a href="{{ route('logout') }}" title="{{ $title }}" class="menu__item menu__item--{{ $variant }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        @if (!empty($icon))
            <svg>
                <use xlink:href="{{ asset("images/sprite.svg#{$icon}") }}"></use>
            </svg>
        @endif

        <span>
            {{ $slot }}
        </span>
    </a>
@else
    <div class="menu__item menu__item--{{ $variant }}">
        @if (!empty($icon))
            <svg>
                <use xlink:href="{{ asset("images/sprite.svg#{$icon}") }}"></use>
            </svg>
        @endif
        <span>
            {{ $slot }}
        </span>
    </div>
@endif