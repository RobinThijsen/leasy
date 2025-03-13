<?php

namespace Leasy\Leasy\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Http\UploadedFile;
use Leasy\Leasy\View\Components\LeasyComponent as Component;

class File extends Component
{
    public string $field;
    public string $fieldName;
    public string $fieldKey;
    public string|bool $label;
    public bool $livewire;
    public bool $required;
    public bool $multiple;
    public string $accept;
    public $maxSize;
	public $preview;

    /**
     * Create a new component instance.
     */
    public function __construct($field, $fieldName, $fieldKey, $label = false, $livewire = false, $required = false, $multiple = false, $accept = "image/png,image/jpeg,image/jpg", $maxSize = "20Mo", $preview = false)
    {
        if ($field == "videos") {
            $maxSize = "500Mo";
        }

        $this->field = $field;
        $this->fieldName = $fieldName;
        $this->fieldKey = $fieldKey;
        $this->label = $label;
        $this->livewire = $livewire;
        $this->required = $required;
        $this->multiple = $multiple;
        $this->accept = $accept;
        $this->maxSize = $maxSize;
		$this->preview = $preview;
    }

	public function getFileName($file)
	{
		if ($file instanceof UploadedFile) {
			return $file->getClientOriginalName();
		}

		if ($file instanceof Attachment) {
			return $file->name;
		}

		if (is_array($file)) {
			return $file['name'];
		}

		return null;
	}

	public function getFilePath($file)
	{
		if ($file instanceof UploadedFile) {
			return $file->temporaryUrl();
		}

		if ($file instanceof Attachment) {
			return $file->path;
		}

		if (is_array($file)) {
			return $file['path'];
		}

		return null;
	}

	public function getSizeOfFile($file)
	{
		$size = null;

		if ($file instanceof UploadedFile) {
			$size = $file->getSize();
		}

		if ($file instanceof Attachment) {
			$size = $file->size;
		}

		if (is_array($file)) {
			$size = $file['size'];
		}

		$hundredMillion = 100000000;
		$million = 1000000;

		$hundredMille = 100000;
		$mille = 1000;

		if ((int) $size > $hundredMillion) {
			return number_format(((int) $size / $million), 2) . "Mo";
		}

		if ((int) $size > $hundredMille) {
			return number_format(((int) $size / $mille), 2) . "Ko";
		}

		return number_format((int) $size, 2) . "o";
	}

	public function getExtensionOfFile($file)
	{
		if ($file instanceof UploadedFile) {
			return $file->getClientOriginalExtension();
		}

		if ($file instanceof Attachment) {
			return $file->extension;
		}

		if (is_array($file)) {
			return $file['extension'];
		}

		return null;
	}

	public function getDynamicIcon($file)
	{
		$extension = $this->getExtensionOfFile($file);

		$dynamicIcon = "file";

		if (in_array($extension, ["xls", "xlsx", "doc", "docx", "pdf", "png", "jpg", "txt"])) {
			if (in_array($extension, ["xls", "xlsx"])) {
				$extension = "xls";
			} elseif (in_array($extension, ["doc", "docx"])) {
				$extension = "doc";
			}

			$dynamicIcon .= "-{$extension}";
		}

		return $dynamicIcon;
	}

	public function isPreviewable($file)
	{
		$extension = $this->getExtensionOfFile($file);

		return in_array($extension, config('livewire.temporary_file_upload.preview_mimes'));
	}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.file');
    }
}
