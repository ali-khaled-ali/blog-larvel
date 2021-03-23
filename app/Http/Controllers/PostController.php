<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $allPosts = Post::all();
        //dd($allPosts);
        // $allPosts = [                         stattic data 
        //     ['id' => 1, 'title' => 'laravel', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20'],
        //     ['id' => 2, 'title' => 'PHP', 'posted_by' => 'Mohamed', 'created_at' => '2021-04-15'],
        //     ['id' => 3, 'title' => 'Javascript', 'posted_by' => 'Ali', 'created_at' => '2021-06-01'],
        // ];

        return view('posts.index', [
            'posts' => $allPosts
        ]);
    }

    public function show($postId)
    {
        //$post = ['id' => 1, 'title' => 'laravel', 'description' => 'laravel is awsome framework', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20'];

       // $post=Post::where('id',$postId);
       
        $post=Post::find($postId);
        //dd($post);
        return view('posts.show', [
            'post' => $post
        ]);
    }
        
    public function edit($postId){

        return view('posts.edit',[
            'post' => $postId
        ]);
    }



    public function create()
    {
        $user = User::all();
        return view('posts.create',[
            'users'=>$user
        ]);
    }



    public function store(Request $post) //it's like i said request() this is called type hinting
    {
        //logic to insert request data into db
        //request()->all()
        //dd($post);


       Post::create([
           'title'=>$post->title,
           'description' => $post->description,
           'user_id' => $post->user_id
       ]);

        return redirect()->route('posts.index');
    }


    public function update()
    {
        //logic to update request data into db
       // dd("hi update");
        return redirect()->route('posts.index');
    }
}