<?php

use App\Models\Webpage;
use Illuminate\Support\Collection;

if (!function_exists('d')) {
	function d(...$vars): void
	{
		foreach ($vars as $v) {
			dump($v);
		}
	}
}

if (!function_exists('pages')) {
	function pages(): Collection
	{
		return Webpage::all();
	}
}

if (!function_exists('buildTree')) {
	function buildTree(Collection $collection, int $parentId = null, string $treeKey = 'parent_id'): Collection
	{
		$tree = collect([]);

		$children = $collection->where($treeKey, $parentId);

		foreach ($children as $child) {
			$child->children = buildTree($collection, $child->id, $treeKey);
			$tree->push($child);
		}

		return $tree;
	}
}