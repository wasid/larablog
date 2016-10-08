@extends('layouts.admin')

@section('content')

@include('includes.form_error')

<h1>Edit Category</h1>
   
        {!! Form::model($categories,['method' => 'patch', 'action' => ['AdminCategoriesController@update', $categories->id]]) !!}
        
        <div class="form-group">
            
            {!! Form::label('name', 'Name:'); !!}
            
            {!! Form::text('name', null, ['class' => 'form-control']); !!}
            
        </div>
       
        <div class="form-goup">
            
            {!! Form::submit('Update Category', ['class' => 'btn btn-primary col-sm-6']); !!}
            
        </div>
        
        {!! Form::close() !!}
        
        <div class="form-goup">
                {!! Form::open([ 'method' => 'delete', 'action' => ['AdminCategoriesController@destroy', $categories->id]]) !!}
                
                <div class="form-goup">
                    
                    {!! Form::submit('Delete Category', ['class' => 'btn btn-danger  col-sm-6']); !!}
                    
                </div>
                
                {!! Form::close() !!}
        </div>
        

@stop