<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
// stick to functions:  index, show, create, store, edit, update and destroy. 

    //index function is used to retrieve all the data from database table 'posts' and display
    //********** function index() ******* */
    public function index(){
        // dd(request(['search'])); // ['search' => 'term to search']
        return view('posts.index', [
            'posts'=> Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(), 
            
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
