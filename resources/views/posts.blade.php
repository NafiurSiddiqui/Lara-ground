
<x-layout>

     @include('_posts-header')

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if ($posts->count())
                  
          <x-post-grid :posts="$posts" />

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
    
    
    
