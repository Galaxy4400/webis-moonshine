<?php

namespace App\Http\Controllers;

use App\Models\Webpage;

class PageController extends Controller
{
	public function __invoke(Webpage $page)
	{
		return view('pages.page', compact('page'));
	}
}
