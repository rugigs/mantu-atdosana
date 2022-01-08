<x-dropdown>

    {{--Trigger for category dropdown--}}
    <x-slot name="trigger">
        <button
            class="py-2 pl-3 pr-9d text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex"
        >
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Kategorijas' }}

            {{--Arrow for the button--}}
            <x-down-arrow class="absolute pointer-events-none"/>
        </button>
    </x-slot>

    {{--Dropdown items--}}
    <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page', 'search')) }}">Visi</x-dropdown-item>

    @foreach($categories as $category)
        <x-dropdown-item
            href="/?category={{ $category->id }}&{{ http_build_query(request()->except('category', 'page')) }}"
        >{{ ucwords($category->name) }}</x-dropdown-item>
    @endforeach

</x-dropdown>
