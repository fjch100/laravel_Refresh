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

    public function scopeFilter($query, array $filters){  //Post::newQuery()->filter()
        
        $query->when($filters['search'] ?? false, function ($query, $search){
            $query->where(fn($query)=>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%'));
        });

            

        $query->when($filters['category'] ?? false, function ($query, $category){
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category));
        });

        $query->when($filters['author'] ?? false, function ($query, $author){
            $query->whereHas('author', fn($query) => $query->where('username', $author));
            
        });

    }

    //hasOne, hasMany, belongsTo, belongsToMany
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){//name atribute in DB, now we use "author" of the post
        return $this->belongsTo(User::class, 'user_id');
    }

}
