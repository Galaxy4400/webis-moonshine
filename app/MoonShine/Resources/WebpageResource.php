<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Webpage;
use MoonShine\Fields\ID;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Attributes\Icon;
use MoonShine\Decorations\Block;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use MoonShine\Fields\Relationships\BelongsTo;
use App\MoonShine\Pages\Webpages\WebpageIndexPage;


#[Icon('heroicons.outline.document-text')]
class WebpageResource extends ModelResource // TreeResource
{
	protected string $model = Webpage::class;

	protected string $title = 'Страницы';

	protected string $column = 'title';

	protected string $sortColumn = 'sorting';

	protected string $treeKey = 'webpage_id';

	protected bool $isAsync = true;


	// protected function pages(): array
	// {
	// 	return [
	// 		WebpageIndexPage::make($this->title()),
	// 		FormPage::make(
	// 			$this->getItemID()
	// 				? __('moonshine::ui.edit')
	// 				: __('moonshine::ui.add')
	// 		),
	// 		DetailPage::make(__('moonshine::ui.show')),
	// 	];
	// }


	public function fields(): array
	{
		return [
			Block::make([
				ID::make()
					->sortable(),

				Text::make('Название', 'title')
					->sortable(),

				Slug::make('ЧПУ', 'slug')
					->from('title')
					->when(!$this->getItem(), fn ($field) => $field->hint('Если не указывать, то поле будет заполнено автоматически на основе заголовка'))
					->readonly((bool) $this->getItem())
					->hideOnIndex(),

				BelongsTo::make('Родительская страница', 'webpage', 'title', new WebpageResource())
					->valuesQuery(fn (Builder $query) => $query->where('id', '!=', $this->getItemID()))
					->nullable()
					->setColumn('webpage_id')
					->sortable(),

				TinyMce::make('Контент страницы', 'body')->hideOnIndex(),
			]),
		];
	}


	// public function indexFields(): array
	// {
	// 	return [
	// 		ID::make()->sortable(),

	// 		Text::make('Название', 'title'),

	// 		BelongsTo::make('Родительская страница', 'page', resource: new WebpageResource())
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

	public function filters(): array
	{
		return [
			Text::make('Название', 'title'),
			BelongsTo::make('Родительская страница', 'webpage', 'title', new WebpageResource())->nullable(),
		];
	}


	public function rules(Model $item): array
	{
		return [];
	}


	public function treeKey(): ?string
	{
		return $this->treeKey;
	}


	public function sortKey(): string
	{
		return $this->sortColumn();
	}
}
