<x-layout>
    <article>
        <h1>
            {{ $post->title }}
        </h1>

        
            <div>
                Category: <a href="#">{{ $post->category->name }}</a>
            </div>


        <p>
            <!-- THIS IS HOW YOU PARSE HTML WITH BLADE -->
            {!! $post->body !!}
        </p>
    
    </article>

    <a href="/posts">Go back</a>   

</x-layout>