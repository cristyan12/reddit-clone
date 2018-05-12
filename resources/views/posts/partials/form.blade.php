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