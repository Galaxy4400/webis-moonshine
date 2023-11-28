<?php

namespace App\Views\Composers;

use App\Menu\Menu;
use App\Menu\MenuItem;
use App\Models\Webpage;
use Illuminate\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use MoonShine\Models\MoonshineUser;

class NavigationComposer
{
	public function compose(View $view): void
	{
		$nodes = Webpage::query()
			->select(['id', 'parent_id', 'title', 'slug', '_lft', '_rgt'])
			->orderBy('sorting', 'asc')
			->get()
			->toTree();

		$menu = $this->constructMenu($nodes);

		$view->with('menu', $menu);
	}


	private function constructMenu($nodes, $label = null, $link = null): Menu
	{
		$menu = new Menu($label, $link);

		$nodes->each(function ($node) use ($menu) {
			$menuItem = $this->constructMenu($node->children, $node->title, route('page', $node->slug));
			$menu->add($menuItem);
		});

		return $menu;
	}

}
