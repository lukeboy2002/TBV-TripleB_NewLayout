<x-app-layout title="Home Page">
    <x-slot name="hero">
        <img src="{{ asset("storage/assets/team.jpg") }}"
             alt="Background Image"
             class="absolute inset-0 w-full h-124 object-cover"
        />
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <h3 class="text-primary font-heading font-semibold tracking-wide text-xl md:text-2xl uppercase">
                Home
            </h3>
            <h1 class="text-5xl font-heading font-black tracking-wider uppercase text-white">
                TBV-TripleB
            </h1>
        </div>
    </x-slot>


    <div>
        <x-heading>Featured Posts</x-heading>

        @foreach($featuredPosts as $featuredPost)
            <x-card.blogpost_featured :post="$featuredPost"/>
        @endforeach

    </div>

    <div class="mt-8">
        <x-heading>Latest Posts</x-heading>
        <div class="grid gap-2 lg:grid-cols-2">
            @foreach($latestPosts as $latestPost)
                <x-card.blogpost :post="$latestPost"/>
            @endforeach
        </div>
    </div>
    <x-slot name="side">
        <div>
            <x-categories/>
        </div>
        <div class="pt-6">
            <x-scorelist/>
        </div>
    </x-slot>
</x-app-layout>