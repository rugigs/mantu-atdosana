<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 ">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Reģistrējies!</h1>
                <form method="post" action="/register" class="mt-10">
                    @csrf
                    <x-form.input name="username">Lietotājvārds</x-form.input>
                    <x-form.input name="email" type="email">E-pasts</x-form.input>
                    <x-form.input name="phone_nr">Telefona numurs</x-form.input>
                    <x-form.input name="password" type="password">Parole</x-form.input>

                    <x-submit-button>Reģistrēties</x-submit-button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
