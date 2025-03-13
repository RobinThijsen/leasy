<th class="{{ $class }}">
    @if ($sortable)
        <button type="button" wire:click.prevent="sortBy('{{ $sortable }}')">
            <span>{{ $slot }}</span>
            @if ($field == $sortable)
                <svg>
                    <use xlink:href="{{ asset("images/sprite.svg#sort-{$direction}") }}"></use>
                </svg>
            @endif
        </button>
    @else
        {{ $slot }}
    @endif
</th>