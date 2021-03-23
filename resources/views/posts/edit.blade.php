


@extends('layouts.app')

@section('title')
Edit
@endsection



@section('content')

<form method="POST" action="{{route('posts.update',['post' => $post])}}">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" class="form-control" id="description"> </textarea>
    </div>
    <div class="form-group">
      <label  for="post_creator">Post Creator</label>
      <select name="user_name" class="form-control" id="post_creator">
          <option>Ahmed</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">update</button>
  </form>


@endsection 