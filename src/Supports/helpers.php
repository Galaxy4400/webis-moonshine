<?php

if (!function_exists('d')) {
	function d(...$vars): void
	{
		foreach ($vars as $v) {
			dump($v);
		}
	}
}