@extends('layouts.admin')

@section('content')

@include('includes.form_error')



@if($comments)
<h1>Comment</h1>
 <table class="table">
    <thead>
      <tr>
        <th>Author</th>
        <th>Email</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
        <th>View</th>
        <th>Approval</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($comments as $comment)
      <tr>
        <td>{{$comment->author}}</td>
        <td>{{$comment->email}}</td>
        <td>{{$comment->body}}</td>
        <td>{{$comment->created_at->diffForHumans()}}</td>
        <td>{{$comment->updated_at->diffForHumans()}}</td>
        <td><a href="{{ route('post', $comment->post->id) }}">View Post</a></td>
        <td>
            
            @if($comment->is_active == 1)
                <div class="form-goup">
                    {!! Form::open([ 'method' => 'patch', 'action' => ['PostCommentsController@update', $comment->id]]) !!}
                        
                        <input type="hidden" name="is_active" value = 0/>
                        
                    <div class="form-goup">
                        
                        {!! Form::submit('Un-Approve', ['class' => 'btn btn-warning']); !!}
                        
                    </div>
                    
                    {!! Form::close() !!}
                </div>
            @else
                <div class="form-goup">
                    {!! Form::open([ 'method' => 'patch', 'action' => ['PostCommentsController@update', $comment->id]]) !!}
                        
                        <input type="hidden" name="is_active" value = 1/>
                        
                    <div class="form-goup">
                        
                        {!! Form::submit('Approve', ['class' => 'btn btn-info']); !!}
                        
                    </div>
                    
                    {!! Form::close() !!}
                </div>
            @endif
            
        </td>
        <td>
            <div class="form-goup">
                {!! Form::open([ 'method' => 'delete', 'action' => ['PostCommentsController@destroy', $comment->id]]) !!}
                
                <div class="form-goup">
                    
                    {!! Form::submit('Delete Comment', ['class' => 'btn btn-danger']); !!}
                    
                </div>
                
                {!! Form::close() !!}
            </div>
        </td>
      </tr>
      @endforeach
    </tbody>

  </table>
@else

    <h1 class="text-center">No Comments</h1>  
    
@endif

  


@stop