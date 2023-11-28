<li>
	<a href="{{ $menuItem->link() }}">{{ $menuItem->label() }}</a>
	@if ($menuItem->count())
		<ul>
			@each('partisals.menu.item', $menuItem->items(), 'menuItem')
		</ul>
	@endif
</li>