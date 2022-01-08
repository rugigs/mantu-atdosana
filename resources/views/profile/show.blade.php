<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
            <h1 class="text-center font-bold text-4xl">Lietotāja {{ $user->name }} sludinajumi!</h1>
            @if ($posts->count())
                <x-posts-grid :posts="$posts"/>

                {{ $posts->links() }}       {{--Lapaspušu rādītājs--}}
            @else
                <p class="text-center">Nav sludinajumu.</p>
            @endif

            <section class="col-span-8 col-start-5 mt-10 space-y-6">
                @auth
                   @include('posts._add-comment-form')
                @else
                    <h1 class="text-center font-bold text-xl">Lai atstātu atsauksmi
                        <a href="/register" class="text-m font-bold uppercase hover:text-blue-500">reģistrējies</a>
                        vai
                        <a href="/login" class="text-m font-bold uppercase hover:text-blue-500">pieslēdzies</a>
                    </h1>
                @endauth

                @foreach($user->reviews as $review)
                    <x-post-comment :review="$review" />
                @endforeach
            </section>
        </main>
    </section>
</x-layout>
