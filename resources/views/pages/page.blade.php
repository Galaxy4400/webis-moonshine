@extends('layouts.main')

@section('title', "Страница: {$page->title}")

@section('content')
	<br>
	<div>
		{!! $page->body !!}
	</div>
@endsection