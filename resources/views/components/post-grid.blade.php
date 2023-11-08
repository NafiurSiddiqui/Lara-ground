@props(['posts'])



<x-post-featured :post="$posts[0]" />

@if ($posts->count() > 1)

    <div class="lg:grid lg:grid-cols-6">
        {{-- Note the skip method is only available if your data is inside a collection --}}

        {{-- we do this to skip the first post of the collection which is only for featured post --}}

        @foreach ($posts->skip(1) as $post)
            {{-- This $loop variable is provided by Laravel. You can dd() here to see what you get from this --}}
            <x-post-card :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
        @endforeach
    </div>

@endif
