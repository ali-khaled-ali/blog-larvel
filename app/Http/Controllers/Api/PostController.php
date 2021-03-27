<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){

       // dd('we are in index');

        //$post = Post::all();

        $post  =  Post::with('user')->paginate(2); //eager loading search with pagination
        
       return PostResource::collection($post);

        
       
    }



    public function show(Post $post){

        return new PostResource($post);
        
    }

    public function store(StorePostRequest $request){


        $post = Post::create($request->all());

       //dd('hi');

       return new PostResource($post);

    }
}
