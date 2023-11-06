<x-layout>
    <h1 class="font-bold text-xl my-8 text-center">
        Publish A New Post
    </h1>
    <x-panel class="max-w-sm mx-auto mt-10">
        <form action="/admin/posts" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-4 ">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-600">Title</label>
                <input type="text" name="title" id="title"
                    class="block w-full py-2 px-4 border border-gray-300 rounded-md text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    placeholder="title" value="{{ old('title') }}" required>
                @error('title')
                    <p class="text-red-500 mt-2 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 ">
                <label for="slug" class="block mb-2 text-sm font-medium text-gray-600">Slug</label>
                <input type="text" name="slug" id="slug"
                    class="block w-full py-2 px-4 border border-gray-300 rounded-md text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    placeholder="slug" value="{{ old('slug') }}" required>
                @error('slug')
                    <p class="text-red-500 mt-2 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="excerpt" class="block mb-2 text-sm font-medium text-gray-600">excerpt</label>
                <input type="text" name="excerpt" id="excerpt"
                    class="block w-full py-2 px-4 border border-gray-300 rounded-md text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    placeholder="excerpt" value="{{ old('excerpt') }}" required>
                @error('excerpt')
                    <p class="text-red-500 mt-2 text-xs">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4 ">
                <label for="story" class="block mb-2 text-sm font-medium text-gray-600">Story</label>
                <textarea name="body" rows="5" placeholder="Your story"
                    class="w-full p-2 text-xs border border-gray-300 focus:outline-none focus:ring rounded-sm" required></textarea>
            </div>

            <div class="mt-4">
                <label for="thumbnail" class="block mb-2 text-sm font-medium text-gray-600">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail"
                    class="block w-full py-2 px-4 border border-gray-300 rounded-md text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    value="{{ old('thumbnail') }}" required>
                @error('thumbnail')
                    <p class="text-red-500 mt-2 text-xs">{{ $message }}</p>
                @enderror

            </div>
            <div class="mt-4 ">
                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-600">Category</label>

                @php
                    $categories = App\Models\Category::all();
                @endphp


                <select name="category_id" id="category_id" class="border">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end">
                <x-submit-button>
                    Publish
                </x-submit-button>
            </div>
            @error('body')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror

        </form>
    </x-panel>
</x-layout>
