@props(['name', 'post'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    @php
        $categories = App\Models\Category::all();
    @endphp


    <select name="category_id" id="category_id" class="border">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ ucwords($category->name) }}</option>
        @endforeach
    </select>



</x-form.field>
