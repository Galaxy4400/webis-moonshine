@if(!empty($items[0]))
	<ul x-data="sortable('{{ $route }}', 'nested')"
		class="grid gap-4"
		data-id=""
		data-handle=".handle"
		data-animation="150"
		data-fallbackOnBody="true"
		data-swapThreshold="0.65"
	>
		@foreach($items[0] as $item)
			<x-admin.tree.item
				:items="$items"
				:item="$item"
				:resource="$resource"
				:buttons="$buttons"
			/>
		@endforeach
	</ul>
@endif
