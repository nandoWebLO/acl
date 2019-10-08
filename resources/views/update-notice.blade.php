@extends('layouts.app')

@section('content')
<div class="container">
	<h1>{{ $notice->title }}</h1>
	<p>{{ $notice->description }}</p>
	<br>
	<b>Autor: {{ $notice->user->name }}</b>
</div>
@endsection
