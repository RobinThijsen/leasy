<div class="dropdown" x-data="{ show: false }">
    <button type="button" x-on:click.prevent="show = true" class="dropdown__button {{ $class }}">
        {{ $button }}
    </button>

    <div class="dropdown__absolute dropdown__absolute--{{ $position }}" wire:dropdown-absolute x-on:click.outside="show = false" x-show="show" x-cloak>
        {{ $slot }}
    </div>
</div>
