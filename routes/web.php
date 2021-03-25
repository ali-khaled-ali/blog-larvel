<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware'=>['auth']],function(){

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
    Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
    Route::post('/posts/{post}', [PostController::class, 'update'])->name('posts.update');


});

// Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware(['auth']);
// Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
// Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit');
// Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');
// Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
// Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
// Route::post('/posts/{post}', [PostController::class, 'update'])->name('posts.update');


// Route::get('/test', 'TestController@testAction'); old syntax

Route::get('/hello-from-framework', function () {
    return 'hello ali';
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
