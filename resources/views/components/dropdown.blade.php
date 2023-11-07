@props(['trigger'])

{{-- This way this is just alpine and does not leak our VIEW --}}

<div x-data="{ show: false }" @click.away="show = false" class="relative">
    {{-- Trigger --}}
    <div @click="show = !false">
        {{ $trigger }}
    </div>
    {{-- Links --}}
    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl w-full z-50 overflow-auto max-h-52 "
        style="display: none">
        {{ $slot }}
    </div>

</div>
