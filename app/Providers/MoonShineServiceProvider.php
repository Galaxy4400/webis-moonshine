<?php

declare(strict_types=1);

namespace App\Providers;

use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Menu\MenuItem;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\PageResource;

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
			MenuItem::make('Страницы', new PageResource()),
			MenuItem::make('Администраторы', new MoonShineUserResource()),
			MenuItem::make('Роли', new MoonShineUserRoleResource()),
		];
	}


	/**
	 * @return array{css: string, colors: array, darkColors: array}
	 */
	protected function theme(): array
	{
		return [
			'colors' => [
				'primary' => '#2288ed',
				'secondary' => '#e7505a',
				'success-bg' => '#1AA244',
			],
			'darkColors' => [
				'primary' => '#1175dd',
				'secondary' => '#d4222e',
				'success-bg' => '#22723b',
			]
		];
	}


	public function boot(): void
	{
		parent::boot();

		moonShineAssets()->add([
			'css/admin.css',
		]);
	}
}
