@extends('layouts.admin')

@section('content')

@include('includes.form_error')

<h1>Media</h1>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @if($photos)
            @foreach($photos as $photo)
      <tr>
        <td>{{$photo->id}}</td>
        <td><img height="50" src="{{$photo->file ? $photo->file : "http://placehold.it/200x200"}}"></img></td>
        <td>{{$photo->created_at->diffForHumans()}}</td>
        <td>{{$photo->updated_at->diffForHumans()}}</td>
        <td>
            <div class="form-goup">
                {!! Form::open([ 'method' => 'delete', 'action' => ['AdminMediasController@destroy', $photo->id]]) !!}
                
                <div class="form-goup">
                    
                    {!! Form::submit('Delete Media', ['class' => 'btn btn-danger']); !!}
                    
                </div>
                
                {!! Form::close() !!}
            </div>
        </td>
      </tr>
      
            @endforeach
     </tbody>
     
     @endif
  </table>


@stop