<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    //********** function index() ******* */
    public function index(){
        // dd(request(['search'])); // ['search' => 'term to search']
        return view('posts.index', [
            'posts'=> Post::latest()->filter(request(['search', 'category', 'author']))->get(), 
            
        ]);
    }

    //************* function show(Post $post) ***** */
    public function show(Post $post){//MODEL BINDING, the ORM lookup the model by de id
        return view ('posts.show',[
            'post'=>$post,
            // 'categories'=>Category::all()
        ]);
    }
}
