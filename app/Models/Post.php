<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $fillable=['title', 'slug', 'excerpt', 'body'];
    
    //the $with property always include the relationsship in the post query
    //if you don't need it use Post::without('author', 'category)->first() in the query
    protected $with = ['category', 'author'];

    //hasOne, hasMany, belongsTo, belongsToMany
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){//name atribute in DB, now we use "author" of the post
        return $this->belongsTo(User::class, 'user_id');
    }

}
