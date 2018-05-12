@extends('layouts.app')

@section('content')
	@include('posts.partials.errors')
	<div class="card">
		<div class="card-header"><h4>Create post</h4></div>
		<div class="card-body">
			@include('posts.partials.form')
		</div>
	</div>
@endsection