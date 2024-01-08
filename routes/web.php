<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('post/{post:slug}', [PostController::class, 'show']);

Route::get('categories/{category:slug}', function (Category $category){
    // return view('posts',  ['posts'=> $category->posts->load(['category', 'author'])]);// sin la propiedad $with=[] en el Model
    return view('posts',  [
        'posts'=> $category->posts,
        'categories'=>Category::all(),
        'currentCategory'=> $category
        ]);
})->name('category');

Route::get('authors/{author:username}', function (User $author){
    return view('posts',  ['posts'=> $author->posts,
    'categories'=> Category::all()
    ]);
});
