<x-layout>

     @include('_posts-header')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

            @if ($posts->count())
                
            <x-post-featured :post="$posts[0]" />
           
            @if ($posts->count() > 1)
                
            <div class="lg:grid lg:grid-cols-6">
                {{-- Note the skip method is only available if your data is inside a collection --}}

                {{-- we do this to skip the first post of the collection which is only for featured post --}}

               @foreach ($posts->skip(1) as $post)
                {{-- This $loop variable is provided by Laravel. You can dd() here to see what you get from this --}}
               <x-post-card :post="$post"  class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
               @endforeach
            </div>

            @endif
         

            <div class="lg:grid lg:grid-cols-3">
              {{-- <x-post-card/>
              <x-post-card/>
              <x-post-card/> --}}
            </div>
             @else
                <p class="text-center border p-2 italic" >No posts yet. Check back later.</p>
            @endif
        </main>
</x-layout>



    
     {{-- @foreach ($posts as $post)
        <article>
            <h1> --}}
                {{-- <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a> --}}
                   {{-- <a href="/posts/{{ $post->id }}">
                    {{ $post->title }}
                </a>             
            </h1>

            <div>
                 By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
            </div>

            <p>
                {{ $post->excerpt }}
            </p>
        </article>
        <hr>
    @endforeach --}}
    
    
    
