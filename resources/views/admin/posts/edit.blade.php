<x-layout>
    <x-setting heading="Edit Post: {{ $post->title }}">
        <form action="/admin/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)" />
            <x-form.input name="slug" :value="old('slug', $post->slug)" />
            <x-form.textarea name="excerpt">
                {{ old('excerpt', $post->excerpt) }}
            </x-form.textarea>

            <x-form.textarea name="body">
                {{ old('body', $post->body) }}
            </x-form.textarea>
            <div class="flex mt-6 ">
                <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-2"
                    width="150">
            </div>

            <x-form.dropdown name="category" :post="$post" />


            <div class="flex justify-end">
                <x-form.button>
                    Update
                </x-form.button>
            </div>
            @error('body')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror

        </form>
    </x-setting>


</x-layout>

{{-- 
    x-form (.) Notation is used to navigate to the sub-folder inside the directory.
    --}}
