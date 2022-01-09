@props(['review'])

<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div style="flex-shrink: 0;">
            <p class="mb-4 mt-2">Vērtējums:</p>
            <p> <span class="inline-block py-1.5 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-600 text-white rounded">{{ $review->rating }}</span> no 10</p>
        </div>

        <div class="w-full ">
            <headers class="mb-4">
                <h3 class="font-bold">{{ $review->reviewer->username }}</h3>
                <p class="text-xs">
                    Publicēts
                    <time>{{ $review->created_at->format('d.m.Y H:i') }}</time>
                </p>
            </headers>

            <p class="mt-2 break-all">
               {{ $review->body }}
            </p>

        </div>
        @auth
            @if(auth()->user()->can('admin') || auth()->user()->id === $review->reviewer_id)
                <div class="mt-6">
                    <form method="post" action="/reviews/{{ $review->id }}">
                        @csrf
                        @method('delete')

                        <button class="text-xs text-red-600">Dzēst</button>
                    </form>
                </div>
            @endif
        @endauth

    </article>
</x-panel>
