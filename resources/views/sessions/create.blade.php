<x-layout>

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto ">
            <x-panel>


                <h1 class="text-center font-bold my-4">Login!</h1>
                <form action="/login" method="POST" class="pb-8">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username" />
                    <x-form.input name="password" type="password" autocomplete="new-password" />

                    <x-form.button>
                        Login
                    </x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
