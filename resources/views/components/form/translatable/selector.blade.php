<div class="selector">
    <div class="form-group form-group--select form-group--selector">
        <select class="form-control" wire:model.live="activeLang">
            @foreach($langs as $lang)
                <option value="{{ $lang['id'] }}">
                    {{ $lang['iso'] }}
                </option>
            @endforeach
        </select>
    </div>
</div>
