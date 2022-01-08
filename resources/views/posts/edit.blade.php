<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form method="post" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <x-form.input name="title" :value="$post->title"/>

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="$post->thumbnail"/>
                </div>
                {{--<img src="/storage/{{ $post->thumbnail }}" alt="" class="rounded-xl ml-6" width="100">--}}
                <img src="https://picsum.photos/id/{{ $post->id }}/600/500" alt="Foto" class="rounded-xl ml-6" width="100">
            </div>

            <x-form.input name="location" :value="$post->location"/>

            <x-form.textarea name="body">{{ $post->body }}</x-form.textarea>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="category_id"
                >
                    Category
                </label>

                <select name="category_id" id="category_id">
                    @foreach(App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ $post->category_id == $category->id? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                @error('category')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <x-submit-button>Rediģēt</x-submit-button>
        </form>
    </x-setting>
</x-layout>
