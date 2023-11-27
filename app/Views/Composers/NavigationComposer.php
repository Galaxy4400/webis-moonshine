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
		$pages = Webpage::query()
			->select(['id', 'parent_id', 'title', 'slug'])
			->orderBy('sorting')
			->get();

		$menu = $this->constructMenu($pages);

		

		// foreach ($pages as $page) {

		// 	$menu->add(new MenuItem('Дом', route('home')));
		// }


		// $menu = Menu::make()
		// 	->add(MenuItem::make('Главная', route('home')))
		// 	->add(MenuItem::make('Каталог', route('catalog')));

		// $view->with('menu', $menu);
	}


	private function constructMenu(Collection $collection, int $parentId = null, string $treeKey = 'parent_id'): Menu
	{
		$menu = new Menu('Главное меню');

		$items = $collection->where($treeKey, $parentId);

		foreach ($items as $item) {
			$submenu = new Menu($item->title, route('page', $item->slug));
			$item->children = $this->constructMenu($collection, $item->id, $treeKey);
			$menu->add($item);
		}

		return $tree;
	}

}




