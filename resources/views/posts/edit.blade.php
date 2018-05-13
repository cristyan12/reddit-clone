@extends('layouts.app')

@section('content')
	@include('posts.partials.errors')
	<div class="card">
		<div class="card-header"><h4>Edit post</h4></div>
		<div class="card-body">
			{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT']) !!}

				@include('posts.partials.form')
			
			{!! Form::close() !!}	
		</div>
	</div>
@endsection