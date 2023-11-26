<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Webpages;

use App\MoonShine\Components\TreeComponent;
use MoonShine\Pages\Crud\IndexPage;

class WebpageIndexPage extends IndexPage
{
	protected function mainLayer(): array
	{
		return [
			...$this->actionButtons(),
			TreeComponent::make($this->getResource()),
		];
	}
}
