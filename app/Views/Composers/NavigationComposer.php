<?php

namespace App\Views\Composers;

use App\Menu\Menu;
use App\Menu\MenuItem;
use App\Models\Webpage;
use Illuminate\View\View;
use Illuminate\Support\Collection;

class NavigationComposer
{
	public function compose(View $view): void
	{
		$test = Webpage::orderBy('sorting', 'asc')->get()->toTree();

		dd($test);

		$pages = Webpage::query()
			->select(['id', 'parent_id', 'title', 'slug'])
			->orderBy('sorting')
			->get();

		$menuItems = $this->constructMenu($pages);
		
		$menu = new Menu('Главное меню');

		foreach ($menuItems as $menuItem) {
			$menu->add($menuItem);
		}

		$view->with('menu', $menu);
	}


	private function constructMenu(Collection $collection, int $parentId = null, string $treeKey = 'parent_id'): array
	{
		$menuItems = [];

		$items = $collection->where($treeKey, $parentId);

		foreach ($items as $item) {
			// $submenu = new Menu($item->title, route('page', $item->slug));
			// $item->children = $this->constructMenu($collection, $item->id, $treeKey);
			// $menu->add($item);
		}

		return $menuItems;
	}

}




