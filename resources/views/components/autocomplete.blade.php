<div data-parent-model="{{ $model }}" class="autocomplete" x-on:click.outside="$wire.$set('autocompleteShow', false)">
    <div class="autocomplete__inputContainer">
        @if (!empty($label))
            <label for="autocompleteSearch" class="autocomplete__inputContainer__label">
                {!! $label !!}
            </label>
        @endif

        <div class="autocomplete__inputContainer__input" x-on:click.prevent="$wire.$set('autocompleteShow', true)">
            <input wire:autocomplete-input type="text" id="autocompleteSearch" wire:model.live="autocompleteSearch" autocomplete="off" />

            <span wire:autocomplete-ghost class="autocomplete__inputContainer__input__ghost" wire:ignore></span>

            <svg class="autocomplete__inputContainer__input__icon">
                <use xlink:href="{{ asset('images/sprite.svg#arrow-down') }}"></use>
            </svg>
        </div>
    </div>

    <div wire:autocomplete class="autocomplete__resultsContainer" x-cloak wire:ignore.self>
        {{ $slot }}
    </div>

    @script
    <script>
        Livewire?.directive('autocomplete', function ({el, directive, component}) {
            const container = document.querySelector(".autocomplete");
            const[modelKey, model] = container.getAttribute('data-parent-model').split('|');

            const input = container.querySelector('[wire\\:autocomplete-input]');
            const ghost = container.querySelector('[wire\\:autocomplete-ghost]');

            let count = component.$wire.get('autocompleteCount');
            let currentKey = component.$wire.get('autocompleteCurrentKey');

            const show = component.$wire.get('autocompleteShow');
            if (!show) $(el).addClass('hidden');

            $(window).on('keydown', event => {
                if (event.which === 38 || event.which === 40) {
                    event.preventDefault();
                    currentKey = component.$wire.get('autocompleteCurrentKey');
                    count = component.$wire.get('autocompleteCount');
                    console.log(currentKey, count);

                    if (currentKey == null) {
                        currentKey = 0;
                    }
                    else {
                        if (currentKey > count)
                            currentKey = count;
                        else {
                            if (event.which === 38 && currentKey > 0) currentKey -= 1;
                            else if (event.which !== 38 && currentKey < count) currentKey += 1;
                        }
                    }

                    component.$wire.set('autocompleteCurrentKey', currentKey);

                    el.querySelectorAll('[wire\\:autocomplete-item]').forEach(function (item, index) {
                        const key = parseInt(item.getAttribute('wire:autocomplete-item'));

                        if (key === currentKey) {
                            if (! $(item).hasClass('autocomplete__resultsContainer__item--active')) {
                                $(item).addClass('autocomplete__resultsContainer__item--active');
                            }
                        }
                        else {
                            if ($(item).hasClass('autocomplete__resultsContainer__item--active')) {
                                $(item).removeClass('autocomplete__resultsContainer__item--active');
                            }
                        }
                    });
                }
                else if (event.which === 9) {
                    event.preventDefault();
                    currentKey = component.$wire.get('autocompleteCurrentKey');
                    count = component.$wire.get('autocompleteCount');

                    if (currentKey != null) component.$wire.call('select');
                    else component.$wire.call('select', 0);
                }
            });

            Livewire?.on('autocomplete.results.updated', function (params) {
                count = component.$wire.get('autocompleteCount');
                if (count === 0 && ! $(el).hasClass('hidden')) {
                    $(el).addClass('hidden');
                }
            });

            Livewire?.on('autocomplete.show.toggle', function () {
                const show = component.$wire.get('autocompleteShow');

                if (!show) ghost.innerHTML = "";

                if (show && $(el).hasClass('hidden')) $(el).removeClass('hidden');
                else if (! show && ! $(el).hasClass('hidden')) $(el).addClass('hidden');
            });

            Livewire?.on('autocomplete.search.updated', function () {
                const search = component.$wire.get('autocompleteSearch');
                component.$wire.set(model, search, modelKey.includes('live'));
            });

            Livewire?.on('autocomplete.currentKey.updated', function (params) {
                console.log(params.content);
                ghost.innerHTML = params.content;
            });
        });
    </script>
    @endscript
</div>
