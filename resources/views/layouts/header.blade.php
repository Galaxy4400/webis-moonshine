<header>
	<ul>
		@foreach (pages() as $page)
			<li><a href="{{ $page->slug }}">{{ $page->title }}</a></li>
		@endforeach
	</ul>
</header>