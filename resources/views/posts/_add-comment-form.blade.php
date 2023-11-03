@auth
    <x-panel>
        <form action="/posts/{{ $post->slug }}/comments" method="post">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60/u={{ auth()->id() }}" alt="" class="rounded-full" width="40"
                    height="40">
                <h3 class="font-bold text-lg ml-3">Add a comment</h3>
            </header>
            {{-- div with a textarea --}}
            <div class="mt-4 ">
                <textarea name="body" rows="5" placeholder="Quick, think of something!"
                    class="w-full p-2 text-xs focus:outline-none focus:ring rounded-sm" required></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 px-10 py-2 rounded-sm text-white mt-4 uppercase hover:bg-blue-600">Post</button>
            </div>
        </form>
        @error('body')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
    </x-panel>
@else
    <p>
        <a href="/register" class="text-blue-500 hover:text-blue-600">Register</a> or
        <a href="/login" class="text-blue-500 hover:text-blue-600"">Login</a> to add comments.
    </p>
@endauth
