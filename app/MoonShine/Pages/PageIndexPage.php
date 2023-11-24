<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\MoonShine\Components\Tree;
use MoonShine\Pages\Crud\IndexPage;

class PageIndexPage extends IndexPage
{
	protected function mainLayer(): array
	{
		return [
			...$this->actionButtons(),
			Tree::make($this->getResource()),
		];
	}
}
