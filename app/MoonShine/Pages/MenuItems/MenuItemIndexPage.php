<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\MenuItems;

use MoonShine\Pages\Crud\IndexPage;
use App\MoonShine\Components\TreeComponent;

class MenuItemIndexPage extends IndexPage
{
	protected function mainLayer(): array
	{
		return [
			...$this->actionButtons(),
			TreeComponent::make($this->getResource()),
		];
	}
}
