<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
{{-- <script type="module" src="http://localhost:5173/@vite/client" ></script> --}}
{{--
 <script type="module" src="http://localhost:5173/resources/js/app.js" ></script> --}}

@vite('/resources/js/app.js')

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/"
                    class="text-amber-800 font-bold text-2xl border-2 border-amber-900 px-3 py-1 rounded-md">

                    T Y P Y
                </a>
            </div>

            <div class="mt-8 md:mt-0">

                {{-- @guest
                <a href="/register" class="text-xs font-bold uppercase mr-3">Register</a>    
                @endguest --}}

                @auth
                    <span class="text-sm">Welcome, {{ auth()->user()->name }}!</span>
                    <form action="/logout" method="post" class="inline">
                        @csrf
                        <button type="submit"
                            class="ml-2 text-xs text-blue-500 hover:bg-blue-500 hover:text-white font-semibold border-2 py-2 px-4 rounded-sm">Log
                            Out</button>
                    </form>
                @else
                    <a href="/register" class="text-xs font-bold uppercase ml-2">Register</a>
                    <a href="/login" class="text-xs font-bold uppercase ml-2">Login</a>
                @endauth




                <a href="#newsletter"
                    class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="#" id="newsletter" class="lg:flex text-sm">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" type="text" placeholder="Your email address"
                                class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
    {{-- Toast Notification --}}
    @if (session()->has('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
            class="bg-green-500 text-white fixed right-3 bottom-3 p-4">
            <p>{{ session('success') }}</p>
        </div>
    @endif
</body>
