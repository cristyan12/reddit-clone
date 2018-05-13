@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-12 offset-md-12">
			<h2>{{ $post->title }}</h2>
			<p>{{ $post->description}}</p>
			<p>Updated {{ $post->updated_at->diffForHumans() }}</p>
		</div>
	</div>
	<hr>
	<a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm">
		Volver al listado
	</a>
@endsection