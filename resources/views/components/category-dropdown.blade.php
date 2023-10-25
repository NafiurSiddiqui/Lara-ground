<x-dropdown>
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-small font-semibold w-full
                            lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name): "Categories" }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>
        </button>

    </x-slot>
    {{-- drop down items--}}

    {{-- Note we show two ways of making a link active --}}
    {{--<x-dropdown-items href="/posts" :active="request()->routeIs('posts')">All</x-dropdown-items>--}}
    {{--<x-dropdown-items href="/" :active="request()->routeIs('posts') &&  empty(request()->query('category'))">All</x-dropdown-items>--}}
    <x-dropdown-items href="/?{{ http_build_query(request()->except('category', 'page')) }}" :active="!$currentCategory">All</x-dropdown-items>


    @foreach ($categories as $category)
        <x-dropdown-items
            {{-- href="/categories/{{ $category->slug }}"--}}
            {{--👇 This is a way of mergin an array of URL. Without this
            if we do &{{ request()->getQueryString() }}
            we double up the category. it becomes, category=xxx&category=yyy&search=zzz.
            http_build_query merge the query.
            In this case, it will merge the query without an additional category=xxx
            --}}

            href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
            :active="isset($currentCategory) && $currentCategory->id === $category->id"
        >
            {{ ucwords($category->name ) }}
        </x-dropdown-items>
    @endforeach
</x-dropdown>
