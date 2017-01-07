@extends('layouts.admin')

@section('content')

@include('includes.form_error')



@if($replies)
<h1>Replies</h1>
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
        @foreach($replies as $reply)
      <tr>
        <td>{{$reply->author}}</td>
        <td>{{$reply->email}}</td>
        <td>{{$reply->body}}</td>
        <td>{{$reply->created_at->diffForHumans()}}</td>
        <td>{{$reply->updated_at->diffForHumans()}}</td>
        <td><a href="{{ route('post', $reply->comment->post->id) }}">View Post</a></td>
        <td>
            
            @if($reply->is_active == 1)
                <div class="form-goup">
                    {!! Form::open([ 'method' => 'patch', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
                        
                        <input type="hidden" name="is_active" value = 0/>
                        
                    <div class="form-goup">
                        
                        {!! Form::submit('Un-Approve', ['class' => 'btn btn-warning']); !!}
                        
                    </div>
                    
                    {!! Form::close() !!}
                </div>
            @else
                <div class="form-goup">
                    {!! Form::open([ 'method' => 'patch', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}
                        
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
                {!! Form::open([ 'method' => 'delete', 'action' => ['CommentRepliesController@destroy', $reply->id]]) !!}
                
                <div class="form-goup">
                    
                    {!! Form::submit('Delete Reply', ['class' => 'btn btn-danger']); !!}
                    
                </div>
                
                {!! Form::close() !!}
            </div>
        </td>
      </tr>
      @endforeach
    </tbody>

  </table>
@else

    <h1 class="text-center">No replies</h1>  
    
@endif

  


@stop