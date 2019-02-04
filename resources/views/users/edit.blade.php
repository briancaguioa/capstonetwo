@extends('layouts.app')

@section('content')
	<h1>Edit User</h1>
    {!! Form::open(['action' => ['UsersController@update', $user->id], 'enctype' => 'multipart/form-data', 'method' => 'POST']) !!}
        <div class="form-group">
           {{Form::label('name', 'Name')}}
           {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>

        <div class="form-group">
           {{Form::label('email', 'Email')}}
           {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
       
        <div class="form-group">
           {{Form::label('address', 'Email')}}
           {{Form::text('address', $user->address, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>

        <div class="form-group">
           {{Form::label('role_id', 'role_id')}}
           {{Form::text('role_id', $user->roles_id, ['class' => 'form-control', 'placeholder' => 'Description'])}}
        </div>
       

        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary' ])}}
    {!! Form::close() !!}
	 
@endsection
