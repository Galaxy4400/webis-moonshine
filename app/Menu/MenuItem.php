<?php

namespace App\Menu;

class MenuItem extends MenuComponent
{
	public function __construct(
		protected string $label,
		protected ?string $link = null,
	) {
	}
}
