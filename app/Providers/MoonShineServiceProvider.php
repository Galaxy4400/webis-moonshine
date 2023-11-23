<?php

declare(strict_types=1);

namespace App\Providers;

use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Menu\MenuItem;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{

	protected function resources(): array
	{
		return [];
	}


	protected function pages(): array
	{
		return [];
	}


	protected function menu(): array
	{
		return [
			MenuItem::make('Администраторы', new MoonShineUserResource()),
			MenuItem::make('Роли', new MoonShineUserRoleResource()),
		];
	}


	/**
	 * @return array{css: string, colors: array, darkColors: array}
	 */
	protected function theme(): array
	{
		return [];
	}
}
