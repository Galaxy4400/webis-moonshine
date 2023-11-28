<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\MenuItem;
use MoonShine\Fields\ID;

use MoonShine\Fields\Text;
use MoonShine\Decorations\Block;
use MoonShine\Pages\Crud\FormPage;
use MoonShine\Pages\Crud\DetailPage;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\MoonShine\Pages\MenuItems\MenuItemIndexPage;

class MenuItemResource extends TreeResource // ModelResource
{
	protected string $model = MenuItem::class;

	protected string $title = 'Элементы меню';

	protected string $column = 'title';

	protected string $sortColumn = 'sorting';

	protected string $treeKey = 'parent_id';

	protected bool $createInModal = true;
 
	protected bool $editInModal = true;

	protected bool $detailInModal = true;

	protected bool $isAsync = true;


	protected function pages(): array
	{
		return [
			MenuItemIndexPage::make($this->title()),
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
				ID::make(),
				
				Text::make('Пункт меню', 'title'),
			]),
		];
	}


	// public function query(): Builder
	// {
	// 	return parent::query()
	// 		->limit(5);
	// }


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
