<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src="/images/illustration-1.png" alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">{{ $post->author->username }}</h5>
                            <h6>Mascot at Laracasts</h6>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/posts"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        <div class="space-x-2">
                            <a href="/categories/{{ $post->category->slug }}"
                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">{{ $post->category->name }}</a>

                        </div>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{ $post->title }}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        {!! $post->body !!}
                    </div>
                </div>

                <section class="col-span-8 col-start-5 mt-10 space-y-4">
                    <x-panel>
                        <form action="#" method="post">
                            @csrf
                            <header class="flex items-center">
                                <img src="https://i.pravatar.cc/60/u={{ auth()->id() }}" alt=""
                                    class="rounded-full" width="40" height="40">
                                <h3 class="font-bold text-lg ml-3">Add a comment</h3>
                            </header>
                            {{-- div with a textarea --}}
                            <div class="mt-4 ">
                                <textarea name="body" rows="5" placeholder="Quick, think of something!"
                                    class="w-full p-2 text-xs focus:outline-none focus:ring rounded-sm"></textarea>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="bg-blue-500 px-10 py-2 rounded-sm text-white mt-4 uppercase hover:bg-blue-600">Post</button>
                            </div>
                        </form>
                    </x-panel>


                    @foreach ($post->comments as $comment)
                        <x-post-comment :comment="$comment" />
                    @endforeach

                </section>
            </article>
        </main>
    </section>
</x-layout>
