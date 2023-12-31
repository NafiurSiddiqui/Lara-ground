<x-layout>

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto bg-gray-100 border-2 px-4 py-2 mt-10">

            <h1 class="text-center font-bold my-4">Register</h1>
            <form action="/register" method="POST" class="">
                @csrf
                <div class="mb-4 ">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-600">Username</label>
                    <input type="text" name="username" id="username" class="block w-full py-2 px-4 border border-gray-300 rounded-md text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Enter your username" 
                    value="{{ old('username') }}"
                    required>
                     @error('username')
                        <p class="text-red-500 mt-2 text-xs">{{ $message }}</p>    
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-600">Name</label>
                    <input type="text" name="name" id="name" class="block w-full py-2 px-4 border border-gray-300 rounded-md text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Enter your name" required
                    value="{{ old('name') }}"
                    >

                    @error('name')
                        <p class="text-red-500 mt-2 text-xs">{{ $message }}</p>    
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-600">Email</label>
                    <input type="email" name="email" id="email" class="block w-full py-2 px-4 border border-gray-300 rounded-md text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Enter your email"
                    value="{{ old('email') }}"
                    required>
                     @error('email')
                        <p class="text-red-500 mt-2 text-xs">{{ $message }}</p>    
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-600">Password</label>
                    <input type="password" name="password" id="password" class="block w-full py-2 px-4 border border-gray-300 rounded-md text-gray-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Enter your password"
                    required>
                     @error('password')
                        <p class="text-red-500 mt-2 text-xs">{{ $message }}</p>    
                    @enderror
                </div>

                <div class="text-center mt-8">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:text-sm">Submit</button>

                </div>

            </form>
        </main>
    </section>
</x-layout>


{{-- 
    @error('<name of the input field>')
    - gives you access to the error message associated with the 'arguemnt' you provide.
    
    --}}


    {{-- input fields value={{ old('<name>') }} 
        
        - Gives you back the flushed value that was lost during refresh --}}

    {{-- Don't include the old password ⚠️ --}}

