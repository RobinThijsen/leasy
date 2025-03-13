<?php

namespace Leasy\Leasy\Traits;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

trait AutocompleteTrait
{
	public string $autocompleteSearch = "";
	public ?int $autocompleteCount = null;
	public ?int $autocompleteCurrentKey = null;
	public ?int $autocompleteSelectedKey = null;
	public array $autocompleteKeys = [];
	public mixed $autocompleteResults;
	public bool $autocompleteShow = false;

	/**
	 * Method that select the current key and fill autocomplete search's values with the key's content
	 *
	 * @param int|null $key specific selected key or default current key
	 * @return void
	 */
	public function select(?int $key = null): void
	{
		if (is_null($key)) {
			$key = $this->autocompleteCurrentKey;
		}

		$this->autocompleteSelectedKey = $key;
		$this->dispatch('autocomplete.selectedKey.updated', key: $this->autocompleteSelectedKey);

		$this->autocompleteResults = $this->query();

		$this->autocompleteSearch = $this->getContent($key);
		$this->dispatch('autocomplete.search.updated');

		$this->autocompleteShow = false;
		$this->dispatch('autocomplete.show.toggle');

		$this->setCount();
	}

	/**
	 * Replace the same content as the autocomplete search value in the given value
	 *
	 * @param string $value the value where the replace will be done
	 * @return string
	 */
	public function replace(string $value): string
	{
		if (!empty($this->search) && str_contains($value, $this->autocompleteSearch)) {
			$replacement = "<span class='autocomplete__resultsContainer__item__value'>{$this->autocompleteSearch}</span>";
			return str_ireplace($this->autocompleteSearch, $replacement, $value);
		}

		return $value;
	}

	/**
	 * Renderer method of the autocomplete system
	 *
	 * Call this method in your component's render method
	 *
	 * @return void
	 */
	public function autocompleteRender(): void
	{
		$this->autocompleteResults = $this->query();
		$this->autocompleteKeys = $this->autocompleteResults->pluck('id')->toArray();
		$this->setCount();
	}

	public function updatedAutocompleteResults(): void
	{
		if ($this->autocompleteSearch == "") {
			$this->autocompleteCurrentKey = null;
			$this->autocompleteShow = true;
		}
		else {
			$this->autocompleteCurrentKey = 0;
		}

		$this->dispatch('autocomplete.results.updated');
		// $this->autocompleteKeys = $this->autocompleteResults->pluck('id');
	}

	public function updatedAutocompleteShow(): void
	{
		$this->dispatch('autocomplete.show.toggle');
	}

	public function updatedAutocompleteSearch(): void
	{
		$this->dispatch('autocomplete.search.updated');
	}

	public function updatedAutocompleteCurrentKey(): void
	{
		$this->dispatch('autocomplete.currentKey.updated', content: $this->getContent($this->autocompleteCurrentKey));
	}

	public function updatedAutocompleteSelectedKey(): void
	{
		$this->dispatch('autocomplete.selectedKey.updated', key: $this->autocompleteSelectedKey);
	}

	/**
	 * Return the item of the given key
	 *
	 * @param mixed $key the key of the item to return
	 * @return mixed
	 */
	protected function getItem(mixed $key): mixed
	{
		return $this->autocompleteResults[$key] ?? null;
	}

	/**
	 * Set the autocomplete count of the autocomplete results
	 *
	 * @return void
	 */
	protected function setCount(): void
	{
		$this->autocompleteCount = is_array($this->autocompleteResults)
			? (count($this->autocompleteResults) - 1)
			: ($this->autocompleteResults->count() - 1);
	}

	/**
	 * Return the value to display for the specific key
	 *
	 * @param int $key the key of the element of the autocomplete results
	 * @return string
	 */
	abstract public function getContent(int $key): string;

	/**
	 * The query that will be execute for the autocomplete results
	 *
	 * @return LengthAwarePaginator|Collection|array
	 */
	abstract public function query(): mixed;
}
