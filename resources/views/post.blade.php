<x-layout>
    
    <article>
        <h1>
            {{-- {!! $post->title !!} --}}
            {{ $post->title }}
        </h1>

           {{-- {{ ddd($post) }} --}}
            <div>
                {{-- By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a> --}}
            </div>


        <p>
            <!-- THIS IS HOW YOU PARSE HTML WITH BLADE -->
            {!! $post->body !!}
        </p>
    
    </article>

    <a href="/posts">Go back</a>   

</x-layout>