@if(auth()->user()->id !== $user->id)
    <x-panel>
        <form method="post" action="/users/{{ $user->id }}/review" >
            @csrf
            <header class="flex items-center">
                <h1 class="ml-4 text-xl ">Atstāj atsauksmi!</h1>
            </header>

            <div class="mt-6">
                <textarea name="body" class="border border-gray-400 p-2 w-full" rows="5" placeholder="Tavas domas par attdevēju." required></textarea>
            </div>
            @error('body')
            <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror

            <p class="block my-2 uppercase font-bold text-m text-gray-700">Vērtējums: no 1 līdz 10</p>
            <div class="w-16">
                <x-form.input name="rating" type="number"></x-form.input>
            </div>
            <div class="flex justify-end mt-16 pt-6 border-t border-gray-200">
                <x-submit-button>Publicēt</x-submit-button>
            </div>
        </form>
    </x-panel>
@endif

