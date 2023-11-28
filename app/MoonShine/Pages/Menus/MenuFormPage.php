<?php

declare(strict_types=1);

namespace App\MoonShine\Pages\Menus;

use App\MoonShine\Components\TreeComponent;
use App\MoonShine\Resources\MenuItemResource;
use MoonShine\Pages\Crud\FormPage;


class MenuFormPage extends FormPage
{
	protected function bottomLayer(): array
	{
		return [
			TreeComponent::make(new MenuItemResource()),
			...parent::bottomLayer()
		];
	}
}
