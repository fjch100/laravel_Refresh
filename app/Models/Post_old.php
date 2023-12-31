<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post {
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug) {
        $this->title= $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function findOrFail($slug){        
        $post = static::find($slug);
        if(!$post){
            throw new ModelNotFoundException("Post with slug: {$slug} not found");
        }
        return $post;
     }

     public static function find($slug){       
        return static::All()->firstWhere('slug', $slug);
     }

    public static function All(){
        return cache()->rememberForever('posts.all', function(){
            return collect(File::files(resource_path("posts/")))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(fn($document) => $post = new Post(
                                            $document->title,
                                            $document->excerpt,
                                            $document->date,
                                            $document->body(),
                                            $document->slug
                                            )
                    )->sortByDesc('date');
        });  
    }
}