@extends('layout')

@section('content')
    @foreach ($posts as $post)    
    <article>
        <h1><a href="/post/{{$post->id}}">{{$post->title}}</a></h1>
        <p>by <a href="/authors/{{$post->author->username}}">{{$post->author->name}} </a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>
        <p>{!! $post->body !!}</p>
    </article>
    @endforeach
@endsection