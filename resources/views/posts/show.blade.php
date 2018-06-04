@extends('layouts.app')

@section('header') @stop

@section('content')
<div class="row">
	<div class="col-md-10 mx-auto">
		<div class="card">
			<div class="card-header">
				<h2 class="display-3">{{ $post->title }}</h2>
				<b>by {{ $post->user->name }} {{ $post->created_at->diffForHumans() }}</b>
			</div>
			<div class="card-body">
				<p>{{ $post->description}}</p>
				<p><a href="{{ url($post->url) }}">{{ $post->url }}</a></p>
				<hr>

				@if(! Auth::check())
					Please log in in your account to comment!
				@else
					{!! Form::model($post, ['route' => ['comments.store', $post->id], 'method' => 'POST']) !!}

						<div class="form-group">
							{{ Form::label('comment', 'Comment') }}
							{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
						</div>

						{{ Form::submit('Comment', ['class' => 'btn btn-primary']) }}

					{!! Form::close() !!}
				@endif
				<hr>
				@if(count($post->comments) > 0)
					<div class="display-4">{{ count($post->comments) }} Comentarios</div>
					<hr>
				@endif

				@foreach ($post->comments as $comment)
				    <p><b>{{ $comment->user->name }}</b></p>
				    <p>{{ $comment->comment }} <span class="float-right">{{ $comment->created_at->diffForHumans() }}</span></p>
					<hr>
				@endforeach
			</div>
			<div class="card-footer">
				<a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm float-right">
					Volver al listado
				</a>
			</div>
		</div>
	</div>
</div>
@endsection