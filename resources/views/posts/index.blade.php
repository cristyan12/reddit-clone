@extends('layouts.app')

@section('content')
	@foreach($posts as $post)
		<div class="row">
			<div class="col-md-12 offset-md-12">
				<h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
				<p>Posted {{ $post->created_at->diffForHumans() }}</p>
			</div>
		</div>
		<hr>
	@endforeach

	{{ $posts->render() }}
@endsection