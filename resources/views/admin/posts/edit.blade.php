@extends('layouts.admin')

@section('content')

@include('includes.form_error')

<h1>Edit Posts</h1>
    <div class="col-sm-3">
        
        <img height="150" src="{{$posts->photo ? $posts->photo->file : "http://placehold.it/200x200"}}"></img>
        
    </div>

    <div class="col-sm-9">  
    
        {!! Form::model($posts, ['method' => 'patch', 'action' => ['AdminPostsController@update', $posts->id], 'files' => true]) !!}
        
        <div class="form-group">
            
            {!! Form::label('title', 'Title:'); !!}
            
            {!! Form::text('title', null, ['class' => 'form-control']); !!}
            
        </div>
        <div class="form-group">
            
            {!! Form::label('category_id', 'Category:'); !!}
            
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']); !!}
            
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
                
                {!! Form::submit('Update Post', ['class' => 'btn btn-primary  col-sm-6']); !!}
                
            </div>
            
            {!! Form::close() !!}
            
            <div class="form-goup">
                {!! Form::open([ 'method' => 'delete', 'action' => ['AdminPostsController@destroy', $posts->id]]) !!}
                
                <div class="form-goup">
                    
                    {!! Form::submit('Delete Post', ['class' => 'btn btn-danger  col-sm-6']); !!}
                    
                </div>
                
                {!! Form::close() !!}
            </div>
        </div>
@stop