<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Page;
use MoonShine\Fields\ID;

use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Attributes\Icon;
use MoonShine\Decorations\Block;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Pages\Crud\DetailPage;
use App\MoonShine\Pages\PageIndexPage;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\Relationships\BelongsTo;


#[Icon('heroicons.outline.document-text')]
class PageResource extends TreeResource
{
	protected string $model = Page::class;

	protected string $title = 'Страницы';

	protected string $column = 'title';

	protected string $sortColumn = 'sorting';



	protected function pages(): array
	{
		return [
			PageIndexPage::make($this->title()),
			FormPage::make(
				$this->getItemID()
					? __('moonshine::ui.edit')
					: __('moonshine::ui.add')
			),
			DetailPage::make(__('moonshine::ui.show')),
		];
	}


	public function fields(): array
	{
		return [
			Block::make([
				ID::make()->sortable(),

				Text::make('Название', 'title'),

				Slug::make('ЧПУ', 'slug')
					->from('title')
					->when(!$this->getItemID(), fn ($field) => $field->hint('Если не указывать, то поле будет заполнено автоматически на основе заголовка'))
					->readonly((bool) $this->getItemID())
					->hideOnIndex(),

				BelongsTo::make('Родительская страница', 'page', 'title', new PageResource())->nullable(),

				TinyMce::make('Контент страницы', 'body')->hideOnIndex(),
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


	public function treeKey(): ?string
	{
		return 'page_id';
	}

	public function sortKey(): string
	{
		return $this->sortColumn();
	}
}
