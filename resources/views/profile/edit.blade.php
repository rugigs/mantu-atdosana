<x-layout>
    <x-setting heading="Rediģēt savus datus">
        <form method="post" action="/users/{{ $user->id }}" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <x-form.input name="username" :value="$user->username">Lietotājvārds</x-form.input>
            <x-form.input name="email" :value="$user->email">E-pasts</x-form.input>
            <x-form.input name="phone_nr" :value="$user->phone_nr">Telefona numurs</x-form.input>

            <x-submit-button>Rediģēt</x-submit-button>
        </form>
    </x-setting>
</x-layout>
