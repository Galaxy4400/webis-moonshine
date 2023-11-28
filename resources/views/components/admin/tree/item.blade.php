@props([
	'resource',
	'item',
	'items',
	'buttons',
])


<li
	data-id="{{ $item->getKey() }}"
	x-data="{'tree_show_{{ $item->getKey() }}': $persist(true).as('tree_resource_{{ $item->getKey() }}')}"
>
	<div class="line flex justify-between items-center gap-4">
	
		<div class="handle cursor-pointer flex justify-start items-center gap-4">

			<a @click.stop="tree_show_{{ $item->getKey() }} = !tree_show_{{ $item->getKey() }}"
				class="flex gap-2 items-center"
			>
				<x-moonshine::icon icon="heroicons.chevron-up-down" />

				<div>
					{{ $item->getKey() }}
				</div>
				<div>
					{{ $item->{$resource->column()} }}
				</div>

				@if (isset($items[$item->getKey()]))
					<x-moonshine::badge color="blue">
							{{ count($items[$item->getKey()]) }}
					</x-moonshine::badge>
				@endif
			</a>


		</div>

		<div class="flex justify-between items-center gap-4">
			<x-moonshine::action-group
				:actions="$buttons($item)"
			/>
		</div>
		
	</div>

	@if($resource->treeKey())
		<ul x-data="sortable('{{ $resource->route('sortable') }}', 'nested')"
			class="dropzone grid gap-4 mt-4 py-4"
			x-show="tree_show_{{ $item->getKey() }}"
			data-id="{{ $item->getKey() }}"
			data-handle=".handle"
			data-animation="150"
			data-fallbackOnBody="true"
			data-swapThreshold="0.65"
		>

			@if(isset($items[$item->getKey()]))
				@foreach($items[$item->getKey()] as $inner)
					<x-admin.tree.item
						:items="$items"
						:item="$inner"
						:resource="$resource"
						:buttons="$buttons"
					/>
				@endforeach
			@endif
		</ul>
	@endif
</li>
