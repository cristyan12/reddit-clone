@extends('layouts.app')

@section('header') @stop

@section('content')
<div class="row">
	<div class="col-md-10 mx-auto">
		<div class="card">
			<div class="card-header">
				<h2 class="display-4">{{ $post->title }}</h2>
			</div>
			<div class="card-body">
				<p>{{ $post->description}}</p>
				
				<p>
					<a href="{{ url($post->url) }}">{{ $post->url }}</a>
				</p>
				
				<p>Created {{ $post->created_at->diffForHumans() }}</p>

				<hr>
				
				<h4>Comentarios:</h4>
				{!! Form::model($post, ['route' => ['comments.store', $post->id], 'method' => 'POST']) !!}

			        <div class="form-group">
			        	{{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '5']) }}
			        </div>

			        {{ Form::submit('Comment', ['class' => 'btn btn-primary']) }}

			    {!! Form::close() !!}
			</div>
			<div class="card-footer">
				<a href="{{ route('posts.index') }}" class="btn btn-secondary btn-sm float-right">
					Volver al listado
				</a>
			</div>
		</div>
		<div class="card">
			<div class="card-header">
				Comentarios anteriores
			</div>
			<div class="card-body">
				@foreach($post->comments as $comment)
					<p>{{ $comment->comment }}</p>
					<hr>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection