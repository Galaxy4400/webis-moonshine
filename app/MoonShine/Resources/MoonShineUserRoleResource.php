<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Attributes\Icon;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Models\MoonshineUserRole;
use MoonShine\Resources\ModelResource;

#[Icon('heroicons.outline.key')]
class MoonShineUserRoleResource extends ModelResource
{
	public string $title = 'Роли';

	public string $model = MoonshineUserRole::class;

	public string $column = 'name';

	protected bool $isAsync = true;

	protected bool $createInModal = true;

	protected bool $editInModal = true;


	public function fields(): array
	{
		return [
			Block::make('', [
				ID::make()->sortable()->showOnExport(),
				Text::make('Название', 'name')
					->required(),
			]),
		];
	}

	/**
	 * @return array{name: string}
	 */
	public function rules($item): array
	{
		return [
			'name' => 'required|min:5',
		];
	}

	public function search(): array
	{
		return ['id', 'name'];
	}
}
