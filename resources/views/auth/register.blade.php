@extends('layouts.app')

@section('header') @stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card bg-light mb-3">
                <div class="card-header">Register</div>
                <div class="card-body">
                    {!! Form::open(['route' => 'register']) !!}
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'required', 'autofocus']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'E-Mail Address') }}
                            {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'required']) }}
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}
                            {{ Form::password('password', ['class' => 'form-control', 'required']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('password-confirmation', 'Confirm Password') }}
                            {{ Form::password('password_confirmation', ['class' => 'form-control', 'required']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::submit('Register', ['class' => 'btn btn-primary']) }}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
