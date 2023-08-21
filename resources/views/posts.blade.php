<x-layout>

  @foreach ($posts as $post)

        <article>
            <h1>
                {{-- <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}
                </a> --}}
                   <a href="/posts/{{ $post->id }}">
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
    @endforeach
    

</x-layout>