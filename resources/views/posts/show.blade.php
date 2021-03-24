@extends('layouts.app')

@section('title')Show Page @endsection

@section('content')
<div class="card">
    <div class="card-header">
      Post Info
    </div>
   
    <div class="card-body">
      <h5 class="card-title">Title:</h5>
      <p class="card-text">{{ $post->title ? $post->title : ""}}</p>
      <h5 class="card-title">Description:</h5>
      <p class="card-text">{{ $post->description ? $post->description : ""}}</p>
    </div>
</div>


<div class="card" style="margin-top: 50px;">
    <div class="card-header">
      Post Creator Info
    </div>
    <div class="card-body">
      <h5 class="card-title">Name:-</h5>
      <p class="card-text">{{$post->myUserRelation->name}}</p>
      <h5 class="card-title">Emai:-</h5>
      <p class="card-text">{{$post->myUserRelation->email}}</p>
      <h5 class="card-title">Created at:-</h5>
      <p class="card-text">{{$post->created_at}}</p>
    </div>
</div>


@endsection