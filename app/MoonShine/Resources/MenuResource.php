<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Menu;
use MoonShine\Fields\ID;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Attributes\Icon;
use MoonShine\Decorations\Block;
use MoonShine\Pages\Crud\IndexPage;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use App\MoonShine\Pages\Menus\MenuFormPage;

#[Icon('heroicons.outline.bars-arrow-up')]
class MenuResource extends ModelResource
{
	protected string $model = Menu::class;

	protected string $title = 'Конструктор меню';

	protected bool $isAsync = true;

	protected bool $createInModal = true;

	protected bool $detailInModal = true;


	protected function pages(): array
	{
		return [
			IndexPage::make($this->title()),
			MenuFormPage::make(
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
				ID::make()
					->sortable(),

				Text::make('Название', 'name')
					->sortable(),

				Slug::make('Ключ', 'slug')
					->when(!$this->getItem(), fn ($field) => $field->hint('Если не указывать, то поле будет заполнено автоматически на основе заголовка'))
					->from('name')
					->badge('purple'),
			]),
		];
	}


	public function rules(Model $item): array
	{
		return [];
	}
}
