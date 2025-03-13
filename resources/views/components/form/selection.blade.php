<div class="form-group form-group--{{ $type }} selections__item">
    <input type="{{ $type }}"
           id="{{ $id }}"
           {{ $attributes }}
           @if($required)required @endif />

    <label for="{{ $id }}">
        {!! $slot !!}
    </label>
</div>