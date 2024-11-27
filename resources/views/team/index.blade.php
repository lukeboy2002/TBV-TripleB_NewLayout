<x-app-layout title="Team">
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

    <livewire:team-index/>

    <x-slot name="side">
        <p class="text-xl">To be Continued</p>
    </x-slot>


</x-app-layout>