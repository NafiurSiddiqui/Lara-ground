<x-layout>
    <h1 class="font-bold text-xl my-8 text-center">
        Publish A New Post
    </h1>
    <x-panel class="max-w-sm mx-auto mt-10">
        <form action="/admin/posts" method="post" enctype="multipart/form-data">
            @csrf


            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-form.textarea name="excerpt" />
            <x-form.input name="thumbnail" type="file" />
            <x-form.textarea name="body" />
            <x-form.dropdown name="category" />


            <div class="flex justify-end">
                <x-form.button>
                    Publish
                </x-form.button>
            </div>
            @error('body')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror

        </form>
    </x-panel>
</x-layout>

{{-- 
    x-form (.) Notation is used to navigate to the sub-folder inside the directory.
    --}}
