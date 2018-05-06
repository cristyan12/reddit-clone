@extends('layouts.app')

@section('content')
	@if(count($errors) > 0)
		<div class="alert alert-danger" role="alert">
			<ul>
				@foreach($errors->all() as $error)
					<li>
						{{ $error }}
					</li>
				@endforeach
			</ul>
		</div>
	@endif
	<div class="card">
		<div class="card-header"><h4>Create post</h4></div>
		<div class="card-body">
			{!! Form::open(['route' => 'posts.store']) !!}

				<div class="form-group">
					{{ Form::label('title', 'Title') }}
					{{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title', '']) }}
				</div>

				<div class="form-group">
					{{ Form::label('description', 'Description') }}
					{{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5']) }}
				</div>
				
				<div class="form-group">
					{{ Form::label('url', 'Url') }}
					{{ Form::text('url', null, ['class' => 'form-control', 'id' => 'url', '']) }}
				</div>

				<div class="form-group">
					{{ Form::submit('Create Post', ['class' => 'btn btn-primary']) }}
				</div>

			{!! Form::close() !!}	
		</div>
	</div>
@endsection