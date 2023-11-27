<?php

use App\Models\Webpage;

if (!function_exists('d')) {
	function d(...$vars): void
	{
		foreach ($vars as $v) {
			dump($v);
		}
	}
}

if (!function_exists('pages')) {
	function pages()
	{
		return Webpage::all();
	}
}