<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/app.css">
        <title>Posts</title>
    </head>

    <body class="">

        <?php foreach ($posts as $post): ?>

        <article>
            <h1>
                <?= $post->title; ?>
            </h1>

            <p>

            </p>
        </article>
        <hr>

        <?php endforeach; ?>
    </body>

</html>
