@props(['heading'])

<section class="py-8 max-w-4xl mx-auto">

    <h1 class="font-bold text-xl my-8">
        {{ $heading }}
    </h1>

    <div class="flex">

        <aside class="w-48">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All
                        Posts</a>
                </li>
                <li>
                    <a href="/admin/posts/create"
                        class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">Create New Post</a>
                </li>
            </ul>
        </aside>


        <main class="flex-1">
            <x-panel class="max-w-sm mx-auto mt-10">
                {{ $slot }}
            </x-panel>

        </main>

    </div>


</section>
