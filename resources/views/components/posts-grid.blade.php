@props(['posts'])


<div class="lg:grid lg:grid-cols-6">
    @foreach($posts as $post)
        <x-post-card
            :post="$post"
            class="col-span-3"
        />
    @endforeach
</div>

