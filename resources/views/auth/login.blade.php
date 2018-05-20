@extends('layouts.app')

@section('header') @stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">

                    {!! Form::open(['route' => 'login']) !!}
                        <div class="form-group">
                            {{ Form::label('email', 'E-Mail Address') }}
                            {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'required', 'autofocus']) }}
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}
                            {{ Form::password('password', ['class' => 'form-control', 'required']) }}
                        </div>

                        <div class="form-group">
                            <div class="col-md-8">
                                {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
