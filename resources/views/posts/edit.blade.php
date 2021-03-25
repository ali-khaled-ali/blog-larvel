


@extends('layouts.app')

@section('title')
Edit
@endsection



@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form method="POST" action="{{route('posts.update',['post'=>$postId])}}">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp" value = "{{ $post->title}}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" class="form-control" id="description" >{{ $post->description}}</textarea>
    </div>
    <div class="form-group">
      <label  for="post_creator">Post Creator</label>
      <select name="user_id" class="form-control" id="post_creator">
      @foreach($users as $user)
          <option value ="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
        
       </select>
    </div>
    <button type="submit" class="btn btn-primary">update</button>
  </form>


@endsection 