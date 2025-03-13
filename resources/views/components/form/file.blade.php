<fieldset x-data="{ progress: 0 }"
          {{--          x-on:livewire-upload-start="uploading = true"--}}
          {{--          x-on:livewire-upload-finish="uploading = false"--}}
          {{--          x-on:livewire-upload-cancel="uploading = false"--}}
          {{--          x-on:livewire-upload-error="uploading = false"--}}
          x-on:livewire-upload-progress="progress = $event.detail.progress"
          class="form-group form-group--file @if($label)form-group--file--upload @endif">

    @if ($label)
        <label for="{{ $fieldName }}" class="uploadedFileContainer">
            <span class="iconContainer">
                <i class="fa-light fa-file-arrow-up"></i>
            </span>

            <span>{{ $label }}</span>
            <span class="maxSize">
                {{ __('form.label.file.maxSize', ["size" => $maxSize]) }}
            </span>
            <span class="supportedFormats">
                {{ __('form.label.file.supportedFormats', ["formats" => str_replace(["IMAGE/", "APPLICATION/", ","], [".", ".", ", "], strtoupper($accept))]) }}
            </span>
        </label>
    @endif

    <input type="file"
           name="{{ $fieldName }}"
           id="{{ $fieldName }}"
           accept="{{ $accept }}"
           class="@error($fieldKey)is-invalid @enderror"
           @if($required)required="required" @endif
           @if($multiple)multiple @endif
           @if($livewire)wire:model="{{ $fieldKey }}" @endif />

    <ul class="uploadedFileListing">
        @if (!is_null($this->getFile($fieldKey)))
            @if (is_array($this->getFile($fieldKey)))
                @foreach($this->getFile($fieldKey) as $key => $file)
                    <li class="uploadedFileItem" x-bind:class="progress == 100 && 'ended'">
                        @if ($file instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile)
                            <button type="button" wire:click.prevent="removeUploadedFile({{ $key }}, '{{ $fieldKey }}')" class="button button--icon-only">
                                <i class="fa fa-times"></i>
                            </button>
                        @endif

                        <div class="iconContainer">
                            @if ($preview && $isPreviewable($file))
                                <img src="{{ $getFilePath($file) }}" alt="{{ $getFileName($file) }}" />
                            @else
                                <i class="fa fa-{{ $getDynamicIcon($file) }}"></i>
                            @endif
                        </div>

                        <div class="contentContainer">
                            <div class="top">
                                <span>{{ $getFileName($file) }}</span>
                                <span>
                            {{ $getSizeOfFile($file) }}
                        </span>
                            </div>
                            @if ($file instanceof \Illuminate\Http\UploadedFile)
                                <div class="bottom">
                                    <progress max="100" x-bind:value="progress"></progress>

                                    <div class="progressContainer">
                                        <span class="progressbar" :style="`width: ${progress}%;`"></span>
                                    </div>

                                    <div class="indicatorContainer">
                                        <span class="indicator" x-text="progress"></span>%
                                    </div>
                                </div>
                            @endif
                        </div>
                    </li>
                @endforeach
            @else
                <li class="uploadedFileItem" x-bind:class="progress == 100 && 'ended'">
                    @if ($this->getFile($fieldKey) instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile)
                        <button type="button" wire:click.prevent="removeUploadedFile" class="button button--icon-only">
                            <i class="fa fa-times"></i>
                        </button>
                    @endif

                    <div class="iconContainer">
                        @if ($preview && $isPreviewable($this->getFile($fieldKey)))
                            <img src="{{ $getFilePath($this->getFile($fieldKey)) }}" alt="{{ $getFileName($this->getFile($fieldKey)) }}" />
                        @else
                            <i class="fa fa-{{ $getDynamicIcon($this->getFile($fieldKey)) }}"></i>
                        @endif
                    </div>

                    <div class="contentContainer">
                        <div class="top">
                            <span>{{ $getFileName($this->getFile($fieldKey)) }}</span>
                            <span>
                            {{ $getSizeOfFile($this->getFile($fieldKey)) }}
                        </span>
                        </div>
                        @if ($this->getFile($fieldKey) instanceof \Illuminate\Http\UploadedFile)
                            <div class="bottom">
                                <progress max="100" x-bind:value="progress"></progress>

                                <div class="progressContainer">
                                    <span class="progressbar" :style="`width: ${progress}%;`"></span>
                                </div>

                                <div class="indicatorContainer">
                                    <span class="indicator" x-text="progress"></span>%
                                </div>
                            </div>
                        @endif
                    </div>
                </li>
            @endif
        @endif
    </ul>

    @error($fieldKey)
    <span class="error-message">
        {{ $message }}
    </span>
    @enderror

</fieldset>