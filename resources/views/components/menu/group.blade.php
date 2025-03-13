@if (!empty($heading))
    <h5 class="menu__heading">
        {{ $heading }}
    </h5>
@endif

{{ $slot }}

<x-menu.separator />