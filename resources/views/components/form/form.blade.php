<form @if($livewire) wire:submit.self="{{ $livewireAction }}" @else method="post" action="{{ $route }}" @endif
class="@if($className) {{ $className }} @endif">

    @if (!$livewire)
        @method($method)
    @endif

    @if (isset($errors) && $displayErrors)
        <div class="errors">
            @foreach($errors->all() as $error)
                @include('components._alert', ["type" => "danger", "icon" => true, "message" => $error])
            @endforeach
        </div>
    @endif

    @if(Session::has('status'))
        @include('components._alert', ["type" => "success", "icon" => true, "message" => Session::get('status')])
    @endif

    @if ($withButtons)
        <div class="annonce__contentContainer__mainContainer__edit">
            <button type="button" wire:click.prevent="toggleEdit" title="{{ __('commons.buttons.cancel.title') }}" class="button button--tertiary annonce__contentContainer__mainContainer__edit__button">
                            <span>
                                {{ __('commons.buttons.cancel.content') }}
                            </span>
            </button>
            <button type="submit" title="{{ __('commons.buttons.validate.title') }}" class="button annonce__contentContainer__mainContainer__edit__button">
                            <span>
                                {{ __('commons.buttons.validate.content') }}
                            </span>
                <svg>
                    <use xlink:href="{{ asset('images/sprite.svg#check') }}"></use>
                </svg>
            </button>
        </div>
    @endif

    {{ $slot }}

    @if ($withButtons)
        <div class="annonce__contentContainer__mainContainer__edit">
            <button type="button" wire:click.prevent="toggleEdit" title="{{ __('commons.buttons.cancel.title') }}" class="button button--tertiary annonce__contentContainer__mainContainer__edit__button">
                            <span>
                                {{ __('commons.buttons.cancel.content') }}
                            </span>
            </button>
            <button type="submit" title="{{ __('commons.buttons.validate.title') }}" class="button annonce__contentContainer__mainContainer__edit__button">
                            <span>
                                {{ __('commons.buttons.validate.content') }}
                            </span>
                <svg>
                    <use xlink:href="{{ asset('images/sprite.svg#check') }}"></use>
                </svg>
            </button>
        </div>
    @endif

    @csrf
</form>
