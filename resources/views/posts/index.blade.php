@extends('layouts.app')

@section('title')Index Page @endsection

@section('content')
<a href="{{route('posts.create')}}" class="btn btn-success" style="margin-bottom: 20px;">Create Post</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
    
     

      <tr>
        <th scope="row">{{ $post->id }}</th>
        <td>{{ $post->title }}</td>
        <td>{{$post->slug}}</td>
        <td>{{ $post->myUserRelation ? $post->myUserRelation->name : " " }}</td>
        <td>{{ $post->created_at }}</td>
        
        <td>
          <a href="{{ route('posts.show',['post' => $post->id]) }}" class="btn btn-info" style="margin-bottom: 20px;">View</a>
          <a href="{{ route('posts.edit',['post'=> $post->id]) }}" class="btn btn-secondary" style="margin-bottom: 20px;">Edit</a>
          
          <form  method= "POST"   action="{{ route('posts.destroy',['post' => $post->id]) }}" style="display: inline">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger" style="margin-bottom: 20px;" onclick="myFunction(event)" >Delete</button>

          <script>
              function myFunction() {
                if(!confirm(`Confirm Deletion?`))
                      event.preventDefault();

              }          
          </script>
          </form>
        </td>
      </tr>
    @endforeach
    </tbody>
</table>
{{ $posts->links() }}
@endsection