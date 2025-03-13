<div id="toastr-container" class="toastr-container"
     data-toastr-type="{{$this->getType()}}"
     data-toastr-position="{{$this->getPosition()}}">
    <div class="toastr" wire:toastr="toastr-{{ $key }}">
        @if ($this->hasIcon())
            <div class="toastr__icon">
                <svg>
                    <use xlink:href="{{ asset('images/sprite.svg#toastr--' . $this->getIcon()) }}"></use>
                </svg>
            </div>
        @endif

        <div class="toastr__contentContainer">
            @if (!empty($header))
                <h5 class="toastr__contentContainer__title">
                    {{ $header }}
                </h5>
            @endif

            <span class="toastr__contentContainer__content">
                {!! $content !!}
            </span>
        </div>
    </div>
</div>
