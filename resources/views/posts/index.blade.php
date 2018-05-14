@extends('layouts.app')

@section('content')
@foreach($posts as $post)
<div class="row">
	<div class="col-md-12 ">
		<h2>
			<a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
			<small class="float-right">
				<a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-sm btn-info">Edit</a>
				{!! Form::open(['route' => ['posts.delete', $post->id], 'method' => 'DELETE']) !!}
                    <button class="btn btn-sm btn-danger">
                        Delete
                    </button>                           
				{!! Form::close() !!}
			</small>
		</h2>
		<p>Posted {{ $post->created_at->diffForHumans() }}</p>
	</div>
</div>
<hr>
@endforeach
{{ $posts->render() }}
@endsection