<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {

        //$allPosts= Post::all();
        
       // DB::table('posts')->simplepaginate(2);

         //Post::all();

       // dd(Post::paginate(2));
        // $allPosts = [                         stattic data 
        //     ['id' => 1, 'title' => 'laravel', 'posted_by' => 'Ahmed', 'created_at' => '2021-03-20'],
        //     ['id' => 2, 'title' => 'PHP', 'posted_by' => 'Mohamed', 'created_at' => '2021-04-15'],
        //     ['id' => 3, 'title' => 'Javascript', 'posted_by' => 'Ali', 'created_at' => '2021-06-01'],
        // ];

        return view('posts.index', [
            'posts' => Post::paginate(2)
            // $allPosts
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

        $user = User::all();
        $post = Post::find($postId);
        return view('posts.edit',[
            'postId'=>$postId,
            'post' => $post,
            'users'=>$user

        ]);
    }



    public function create()
    {
        $user = User::all();
        return view('posts.create',[
            'users'=>$user
        ]);
    }



    public function store(StorePostRequest $post) //it's like i said request() this is called type hinting
    {
        
        //logic to insert request data into db
        //request()->all()
        //dd($post);


        //we will use StorePostRequest to use the rules difened in the StorePostRequest file instead of here
        // $post->validate([
        //     'title'=>['required','min:3','unique:posts'],
        //     'description'=>['required','min:10']
        // ],[
        //     'title.required'=>'hey you we require a title',
        //     'description.min'=> ' too small desc '
        // ]);


       Post::create([
           'title'=>$post->title,
           'description' => $post->description,
           'user_id' => $post->user_id
       ]);

        return redirect()->route('posts.index');
    }


    public function update($postId)
    {
        //logic to update request data into db
        //Post $post -> gives us a post object
       //dd($postId);
      $post = Post::find($postId);
       
      $body = request();
      // dd($body);


       if($post->title === request()->title){

            $body->validate([
                'title'=>['required','min:3'],
                'description'=>['required','min:10']
            ],[
                'title.required'=>'hey you we require a title',
                'description.min'=> ' too small desc '
            ]);
       }

       else{

            $body->validate([
                'title'=>['required','min:3','unique:posts'],
                'description'=>['required','min:10']
            ],[
                'title.required'=>'hey you we require a title',
                'description.min'=> ' too small desc '
            ]);
       }
        
       
       $post->title = request()->title;
       
       $post->description = request()->description;


       $post->user_id = request()->user_id;
       //dd($post);

       $post->save();


        return redirect()->route('posts.index');
    }


    public function destroy($postId){


        Post::destroy($postId);
        //echo("hiiiiiiiiii");
        // echo '<script type="text/JavaScript"> 
        //           confirm("lolodeleteos");

        //       </script>';
        //dd($postId);

       


       return redirect()->route('posts.index');

    }




}