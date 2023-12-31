<x-layout>
    <x-setting heading="Publish New Post">
        <form action="/admin/posts" method="post" enctype="multipart/form-data">
            @csrf


            <x-form.input name="title" required />
            <x-form.input name="slug" required />
            <x-form.textarea name="excerpt" required />
            <x-form.input name="thumbnail" type="file" required />
            <x-form.textarea name="body"required />
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
    </x-setting>


</x-layout>

{{-- 
    x-form (.) Notation is used to navigate to the sub-folder inside the directory.
    --}}
