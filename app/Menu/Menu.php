<?php

namespace App\Menu;

use Illuminate\Support\Collection;

class Menu extends MenuComponent
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
}
