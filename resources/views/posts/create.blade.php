<x-layout>
    <x-setting heading="Izveidot jaunu sludinājumu">
        <form method="post" action="/posts" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title">Nosaukums</x-form.input>
            <x-form.input name="thumbnail" type="file">Foto</x-form.input>
            <x-form.input name="location">Atrašanās vieta</x-form.input>
            <p class="block mb-2 uppercase font-bold text-xs text-gray-700">Apraksts</p>
            <x-form.textarea name="body"/>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="category_id"
                >
                    Kategorija
                </label>

                <select name="category_id" id="category_id">
                    @foreach(App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                @error('category')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <x-submit-button>Publicēt</x-submit-button>
        </form>
    </x-setting>
</x-layout>
