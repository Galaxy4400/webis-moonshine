<?php

namespace App\Menu;

use Countable;
use Traversable;
use IteratorAggregate;
use Illuminate\Support\Collection;

class Menu extends MenuComponent implements IteratorAggregate, Countable
{
	protected array $items = [];

	
	public function items(): Collection
	{
		return Collection::make($this->items);
	}


	public function add(MenuComponent $item): self
	{
		$this->items[] = $item;

		return $this;
	}


	public function getIterator(): Traversable
	{
		return $this->items();
	}


	public function count(): int
	{
		return $this->items()->count();
	}
}
