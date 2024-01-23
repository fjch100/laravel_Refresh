<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $fillable=['body'];

    //the $with property always include the relationsship in the post query
    //if you don't need it use Comment::without('author', 'post')->first() in the query
    protected $with = ['author'];

    public function author(){   
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }

}
