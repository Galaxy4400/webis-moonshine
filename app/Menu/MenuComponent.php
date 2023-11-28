<?php

namespace App\Menu;

abstract class MenuComponent
{
	public function __construct(
		protected ?string $label = null,
		protected ?string $link = null,
	) {
	}

	public function label(): string
	{
		return $this->label;
	}

	public function link(): string
	{
		return $this->link;
	}
}
