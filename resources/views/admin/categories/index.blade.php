@extends('layouts.admin')

@section('content')

@include('includes.form_error')

<h1>Category</h1>
    <div class="col-sm-6">
    
        {!! Form::open(['method' => 'post', 'action' => 'AdminCategoriesController@store']) !!}
        
        <div class="form-group">
            
            {!! Form::label('name', 'Name:'); !!}
            
            {!! Form::text('name', null, ['class' => 'form-control']); !!}
            
        </div>
       
        <div class="form-goup">
            
            {!! Form::submit('Create Category', ['class' => 'btn btn-primary']); !!}
            
        </div>
        
        {!! Form::close() !!}
        
        
    </div>
     <div class="col-sm-6">
        <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Created At</th>
                
              </tr>
            </thead>
            <tbody>
              @if($categories)
                    @foreach($categories as $category)
              <tr>
                <td>{{$category->id}}</td>
                <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                <td>{{$category->created_at ? $category->created_at->diffForHumans() : 'No Date'}}</td>
              </tr>
              
                    @endforeach
             </tbody>
             
             @endif
        </table>
    </div>
@stop