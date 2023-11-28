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
		return [
			Divider::make(),
			Heading::make('Пункты меню'),
			TreeComponent::make(new MenuItemResource(), $this->getResource()->getItem()->items),
			...parent::bottomLayer()
		];
	}
}
