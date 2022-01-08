<x-layout>
        @include('posts._header') {{--filtri kategorijam un virsrakstiem--}}

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            @if ($posts->count())
                <x-posts-grid :posts="$posts"/>

                {{ $posts->links() }}
            @else
                <p class="text-center">Nav sludinajumu.</p>
            @endif
        </main>

</x-layout>



