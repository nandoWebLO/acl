@extends('layouts.app')

@section('content')
<div class="container">
	@forelse($notices as $notice)
		@can('view_notice', $notice)
			<h1>{{ $notice->title }}</h1>
			<p>{{ $notice->description }}</p>
			<br>
			<b>Autor: {{ $notice->user->name }}</b>
			@can('update-notice', $notice)
				<a href="{{url("/notice/$notice->id/update")}}">Editar</a>
			@endcan
			<hr>
		@endcan
	@empty
		<p>Nenhuma noticia!</p>
	@endforelse
</div>
@endsection
