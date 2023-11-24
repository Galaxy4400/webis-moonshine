<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Page;

use MoonShine\Resources\ModelResource;
use MoonShine\Fields\ID;

class PageResource extends ModelResource
{
	protected string $model = Page::class;

	protected string $title = 'Pages';

	public function indexFields(): array
	{
		return [
			ID::make()->sortable(),
		];
	}

	public function formFields(): array
	{
		return [
			ID::make()->sortable(),
		];
	}

	public function detailFields(): array
	{
		return [
			ID::make()->sortable(),
		];
	}

	public function rules(Model $item): array
	{
		return [];
	}
}
