@extends('layouts.admin')

@section('content')

@include('includes.form_error')

<h1>Edit Users</h1>
    <div class="col-sm-3">
        
        <img height="200" src="{{$user->photo ? $user->photo->file : "http://placehold.it/200x200"}}"></img>
        
    </div>

    <div class="col-sm-9">  
        {!! Form::model($user, [ 'method' => 'patch', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}
        
        <div class="form-group">
            
            {!! Form::label('name', 'Name:'); !!}
            
            {!! Form::text('name', null, ['class' => 'form-control']); !!}
            
        </div>
        
        <div class="form-group">
            
            {!! Form::label('email', 'Email:'); !!}
            
            {!! Form::email('email', null, ['class' => 'form-control']); !!}
            
        </div>
        
        <div class="form-group">
            
            {!! Form::label('role_id', 'Role:'); !!}
            
            {!! Form::select('role_id', ['' => 'Choose One'] + $roles, null, ['class' => 'form-control']); !!}
            
        </div>
        
        <div class="form-group">
            
            {!! Form::label('is_active', 'Status:'); !!}
            
            {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class' => 'form-control']); !!}
            
        </div>
        
        <div class="form-group">
            
            {!! Form::label('photo_id', 'Photo:'); !!}
            
            {!! Form::file('photo_id', null, ['class' => 'form-control']); !!}
            
        </div>
    
        <div class="form-group">
            
            {!! Form::label('password', 'Password:'); !!}
            
            {!! Form::password('password', ['class' => 'form-control']); !!}
            
        </div>
        
        <div class="form-goup">
            
            {!! Form::submit('Update User', ['class' => 'btn btn-primary  col-sm-6']); !!}
            
        </div>
        
        {!! Form::close() !!}
        
        <div class="form-goup">
            {!! Form::open([ 'method' => 'delete', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}
            
            <div class="form-goup">
                
                {!! Form::submit('Delete User', ['class' => 'btn btn-danger  col-sm-6']); !!}
                
            </div>
            
            {!! Form::close() !!}
        </div>

   </div>

@stop