@props(['posts'])
@if ($posts->count())
    <x-post-feature-card :post="$posts[0]"/>
    @if ($posts->count()>1)
        <div class="lg:grid lg:grid-cols-6">            
            @foreach ($posts->skip(1) as $post)
                <x-post-card 
                    :post="$post"
                    class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />                
            @endforeach
        </div>
    @endif

@else
    <p class="col-span-2 text-center">No posts yet</p>
@endif
            
        