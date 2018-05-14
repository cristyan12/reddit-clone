@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header"><h4>Create post</h4></div>
	<div class="card-body">
		{!! Form::open(['route' => 'posts.store']) !!}

			@include('posts._form')
		
		{!! Form::close() !!}	
	</div>
</div>
@endsection