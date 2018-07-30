@extends('layouts.app')

@section('content')
@foreach($posts as $post)
<div class="row">
	<div class="col-md-12 mx-auto">
		<h4>
			<a class="" href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
			@if(Auth::check() && $post->user_id == Auth::user()->id)
				<small class="float-right">
					<a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-info">Edit</a>
					{!! Form::open(['route' => ['posts.delete', $post->id], 'method' => 'DELETE']) !!}
	                    <button class="btn btn-danger">
	                        Delete
	                    </button>                           
					{!! Form::close() !!}
				</small>
			@endif
		</h4>
		<p>Posted {{ $post->created_at->diffForHumans() }} by <b>{{ $post->user->name }}</b></p>
	</div>
</div>
<hr>
@endforeach
{{ $posts->render() }}
@endsection