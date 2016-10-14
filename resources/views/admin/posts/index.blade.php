@extends('layouts.admin')

@section('content')

@include('includes.form_error')

<h1>Posts</h1>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>User</th>
        <th>Category</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
      @if($posts)
            @foreach($posts as $post)
      <tr>
        <td>{{$post->id}}</td>
        <td><img height="50" src="{{$post->photo ? $post->photo->file : "http://placehold.it/200x200"}}"></img></td>
        <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
        <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
        <td>{{$post->title}}</td>
        <td>{{ str_limit($post->body, 15) }}</td>
        <td>{{$post->created_at->diffForHumans()}}</td>
        <td>{{$post->updated_at->diffForHumans()}}</td>
      </tr>
      
            @endforeach
     </tbody>
     
     @endif
  </table>


@stop