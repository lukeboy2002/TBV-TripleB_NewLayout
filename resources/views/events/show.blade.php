<x-app-layout title="Events">
    <x-slot name="hero">
        <img src="{{ asset("storage/assets/event.jpg") }}"
             alt="Background Image"
             class="absolute inset-0 w-full h-124 object-cover object-bottom"
        />
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <h3 class="text-primary font-heading font-semibold tracking-wide text-xl md:text-2xl uppercase">
                Our events
            </h3>
            <h1 class="text-5xl font-heading font-black tracking-wider uppercase text-white">
                TBV-TripleB
            </h1>
        </div>
    </x-slot>

    <article class="bg-light rounded-lg border border-primary shadow-md dark:bg-dark p-4 my-4">
        <header class="border border-dark dark:border-light rounded-lg p-10">
            @if($event->end_date === null)
                <div class=" text-primary text-xl font-heading font-bold pb-4">
                    {{ $event->start_date->format('j F')}}
                </div>
            @else
                <div class="text-primary text-xl font-heading font-bold pb-4">
                    {{ $event->start_date->format('j') }}- {{ $event->end_date->format('j F') }}
                </div>
            @endif

            <div class="text-primary text-2xl font-heading font-bold">{{ $event->title }}</div>
        </header>

        <main class="pt-4 pb-8 px-8 prose-orange prose-sm max-w-none text-dark dark:text-light">
            {!! $event->body !!}
        </main>
        <footer class="flex pt-4">
            @foreach ($event->tags as $tag)
                <x-badge.tag
                    wire:navigate
                    href="{{ route('events.index', ['tag' => $tag->slug]) }}">
                    {{ $tag->name }}
                </x-badge.tag>
            @endforeach
        </footer>
    </article>

    <x-slot name="side">
        <x-upcoming-event/>
        <x-event-tags/>
    </x-slot>
</x-app-layout>
