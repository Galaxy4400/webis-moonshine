<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Page;
use MoonShine\Fields\ID;

use MoonShine\Attributes\Icon;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;

#[Icon('heroicons.outline.document-text')]
class PageResource extends ModelResource
{
	protected string $model = Page::class;

	protected string $title = 'Страницы';


	public function fields(): array
	{
		return [
			Block::make([
				ID::make()->sortable(),

				Text::make('Название', 'title'),

				Slug::make('ЧПУ', 'slug')
					->from('title')
					->hint('Если не указывать, то поле будет заполнено автоматически на основе заголовка')
					->readonly(fn () => (bool) $this->getItemID())
					->hideOnIndex(),

				BelongsTo::make('Родительская страница', 'page', 'title', new PageResource())->nullable(),
			]),
		];
	}


	// public function indexFields(): array
	// {
	// 	return [
	// 		ID::make()->sortable(),

	// 		Text::make('Название', 'title'),

	// 		BelongsTo::make('Родительская страница', 'page', resource: new PageResource())
	// 	];
	// }

	// public function formFields(): array
	// {
	// 	return [
	// 		ID::make()->sortable(),
	// 	];
	// }

	// public function detailFields(): array
	// {
	// 	return [
	// 		ID::make()->sortable(),
	// 	];
	// }


	public function rules(Model $item): array
	{
		return [];
	}
}
