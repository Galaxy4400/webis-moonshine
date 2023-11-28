<header>
	<h1>@yield('title')</h1>
	
	@if ($menu->count())
		<ul>
			@each('partisals.menu.item', $menu->items(), 'menuItem')
		</ul>
	@endif
</header>
