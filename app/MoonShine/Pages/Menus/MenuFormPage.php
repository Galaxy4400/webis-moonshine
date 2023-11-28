<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Menus;

use MoonShine\Decorations\Divider;
use MoonShine\Pages\Crud\FormPage;
use App\MoonShine\Components\TreeComponent;
use App\MoonShine\Resources\MenuItemResource;
use MoonShine\Decorations\Heading;

class MenuFormPage extends FormPage
{
	protected function bottomLayer(): array
	{
		$items = $this->getResource()
			->getItem()
			->items()
			->orderBy('sorting')
			->get();

		return [
			Divider::make(),
			Heading::make('Пункты меню'),
			TreeComponent::make(new MenuItemResource(), $items),
			...parent::bottomLayer()
		];
	}
}
