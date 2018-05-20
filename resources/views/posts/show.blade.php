@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h2>{{ $post->title }}</h2>
			</div>
			<div class="card-body">
				<p>{{ $post->description}}</p>
				<p>
					<a href="{{ url($post->url) }}">{{ $post->url }}</a>
				</p>
				<p>Created {{ $post->created_at->diffForHumans() }}</p>
			</div>
		</div>
	</div>
</div>
<hr>
<a href="{{ route('posts.index') }}" class="btn btn-primary btn-sm">
	Volver al listado
</a>
@endsection