<!doctype html>

<title>Mantu atdošana</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <h2 class="text-4xl font-medium leading-tight text-gray-800">
                    Mantu
                    <span class="inline-block py-1.5 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-600 text-white rounded">Atdošana</span>
                </h2>
            </a>
        </div>

        <div class="mt-8 mr-10 md:mt-0 flex items-center">
            @auth
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="text-m font-bold uppercase">Sveiki, {{ auth()->user()->username }}!</button>
                    </x-slot>

                    <x-dropdown-item href="/users/{{ auth()->user()->id }}">Mani sludinājumi</x-dropdown-item>
                    <x-dropdown-item href="/post/create">Jauns sludinājums</x-dropdown-item>
                    <x-dropdown-item href="/users/{{ auth()->user()->id }}/edit">Rediģēt kontu</x-dropdown-item>
                    <x-dropdown-item href="#">
                        <form method="post" action="/users/{{ auth()->user()->id }}">
                            @csrf
                            @method('delete')
                            <button class="text-s text-red-600">Dzēst kontu</button>
                        </form></x-dropdown-item>
                    <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Izrakstīties</x-dropdown-item>

                    <form id="logout-form" method="post" action="/logout" class="hidden">
                        @csrf
                    </form>
                </x-dropdown>
            @else
                <a href="/register" class="text-m font-bold uppercase hover:text-blue-500">Reģistrēties</a>        {{--Register button for guests--}}
                <a href="/login" class="ml-4 text-m font-bold uppercase hover:text-blue-500">Pieslēgties</a>
            @endauth

        </div>
    </nav>

    {{ $slot }}

</section>

<x-flash/>

</body>

