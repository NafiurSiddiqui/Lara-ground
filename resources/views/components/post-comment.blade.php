@props(['comment'])

<x-panel>
    <article class="flex space-x-2">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60/u={{ $comment->id }}" alt="" class="rounded-full" width="60"
                height="60">
        </div>
        <div class="space-y-4">
            <header>
                <h3 class="font-bold">{{ $comment->author->username }}</h3>
                <p class="text-xs">Posted
                    <time>{{ $comment->created_at }}</time>
                </p>
            </header>

            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>
