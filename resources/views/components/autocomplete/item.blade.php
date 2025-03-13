<button type="button"
        {{ $attributes }}
        wire:autocomplete-item="{{ $key }}"
        wire:click.prevent="select('{{ $key }}')"
        class="{{ $class }}" wire:ignore.self>
    {!! $this->replace($slot) !!}
</button>