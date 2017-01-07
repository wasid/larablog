@extends('layouts.blog-posts')

@section('content')

@include('includes.form_error')

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{ $post->title }}</h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{ $post->user->name }}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" height="900" width="300" src="{{$post->photo ? $post->photo->file : "http://placehold.it/900x300"}}"></img>

                <hr>

                <!-- Post Content -->
                <p>{{ $post->body }}</p>
                <hr>

                <!-- Blog Comments -->
    @if(Auth::check())
                <!--Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                     {!! Form::open(['method' => 'post', 'action' => 'PostCommentsController@store']) !!}
    
                    <input type="hidden" name="post_id" value="{{ $post->id }}"/>
  
                    <div class="form-group">
                        
                        {!! Form::label('body', 'Body:'); !!}
                        
                        {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '1']); !!}
                        
                    </div>
                    
                    <div class="form-goup">
                        
                        {!! Form::submit('Submit Comment', ['class' => 'btn btn-primary']); !!}
                        
                    </div>
                    
                    {!! Form::close() !!}
                </div>
    @endif
                <hr>

                <!-- Posted Comments -->
            @if(count($comments) > 0)
                <!-- Comment -->
                @foreach($comments as $comment)
                <div class="media">
                    <a class="pull-left" href="#">
                        <img height="25" class="media-object" src="{{$comment->photo}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at}}</small>
                        </h4>
                        <p>{{$comment->body}}</p>
                         <!-- Nested Comment -->
                            @if(count($comment->replies) > 0)
                            
                                @foreach($comment->replies as $reply)
                                    @if($reply->is_active == 1)
                                    <div class="media">
                                        <a class="pull-left" href="#">
                                            <img height="25" class="media-object" src="{{$reply->photo}}" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">{{$reply->author}}
                                                <small>{{$reply->created_at}}</small>
                                            </h4>
                                            <p>{{$reply->body}}</p>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @endif                                
                                <div class="comment-reply-container">
                                        
                                    <button class="toggle-reply btn btn-primary pull-right">reply</button>
                                    
                                        <div class="comment-reply col-sm-6">
                                        
                                        {!! Form::open(['method' => 'post', 'action' => 'CommentRepliesController@createReply']) !!}
                                            
                                            <input type="hidden" name="comment_id" value="{{ $comment->id }}"/>
                
                                            <div class="form-group">
                                                
                                                {!! Form::label('body', 'Reply:'); !!}
                                                
                                                {!! Form::textarea('body', null, ['class' => 'form-control', 'rows' => '1']); !!}
                                                
                                            </div>
                                            <div class="form-goup">
                                                
                                                {!! Form::submit('Reply', ['class' => 'btn btn-primary btn-sm']); !!}
                                                
                                            </div>  
                                            
                                        {!! Form::close() !!}
                                        
                                    </div>
                                </div>
                        <!-- End Nested Comment -->
                        </div>

                    </div>
                @endforeach
            @endif
@stop

@section('scripts')

<script type="text/javascript">
    
    $('.comment-reply-container .toggle-reply').click(function(){
        $(this).next().slideToggle();
    });
    
</script>


@stop