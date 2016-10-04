@extends('layouts.admin')

@section('content')

@include('includes.form_error')

<h1>Create Posts</h1>

 {!! Form::open(['method' => 'post', 'action' => 'AdminPostsController@store', 'files' => true]) !!}
    
    <div class="form-group">
        
        {!! Form::label('title', 'Title:'); !!}
        
        {!! Form::text('title', null, ['class' => 'form-control']); !!}
        
    </div>
    <div class="form-group">
        
        {!! Form::label('category_id', 'Category:'); !!}
        
        {!! Form::select('category_id', array(1=>'PHP', 2=>'JavaScript'), null, ['class' => 'form-control']); !!}
        
    </div>
    <div class="form-group">
        
        {!! Form::label('photo_id', 'Photo:'); !!}
        
        {!! Form::file('photo_id', null, ['class' => 'form-control']); !!}
        
    </div>    
    <div class="form-group">
        
        {!! Form::label('body', 'Description:'); !!}
        
        {!! Form::textarea('body', null, ['class' => 'form-control']); !!}
        
    </div>
    
    <div class="form-goup">
        
        {!! Form::submit('Create Post', ['class' => 'btn btn-primary']); !!}
        
    </div>
    
    {!! Form::close() !!}

@stop