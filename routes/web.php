<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('posts', [
        'posts'=>Post::latest()->get(), 
        'categories'=>Category::all()
    ]);
});

Route::get('post/{post:slug}', function(Post $post){//MODEL BINDING, the ORM lookup the model by de id
    return view ('post',[
        'post'=>$post,
        'categories'=>Category::all()
    ]);
});

Route::get('categories/{category:slug}', function (Category $category){
    // return view('posts',  ['posts'=> $category->posts->load(['category', 'author'])]);// sin la propiedad $with=[] en el Model
    return view('posts',  [
        'posts'=> $category->posts,
        'categories'=>Category::all(),
        'currentCategory'=> $category
        ]);
});

Route::get('authors/{author:username}', function (User $author){
    return view('posts',  ['posts'=> $author->posts,
    'categories'=> Category::all()
    ]);
});
