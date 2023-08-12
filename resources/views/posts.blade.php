<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/app.css">
        <title>Posts</title>
    </head>

    <body class="">

        @foreach ($posts as $post)

        <article>
            <h1>
                <a href="/posts/{{$post->slug}}">

                    {{ $post->title }}
                </a>
            </h1>

            <p>

                {{ $post->excerpt }}

            </p>
        </article>
        <hr>

        @endforeach
    </body>

</html>
