<x-app-layout title="Events">
    <x-slot name="hero">
        <img src="{{ asset("storage/assets/newgame.png") }}"
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

    @foreach($events as $event)
        <x-card.default class="mb-4">
            <div class="flex justify-between items-center space-x-6">
                <div class="w-1/4">
                    <img src="{{$event->getImage() }}" class="rounded-l-lg" alt="{{ $event->title }}"/>
                </div>
                <div class="w-2/4">
                    <div class="text-primary text-2xl font-heading font-bold">{{ $event->title }}</div>
                    <div class="text-dark dark:text-light">{{ $event->description}}</div>
                </div>
                <div class="w-1/4">
                    @if($event->end_date === null)
                        <div class=" text-primary text-xl font-heading font-bold">
                            {{ $event->start_date->format('j F')}}
                        </div>
                    @else
                        <div class="text-primary text-xl font-heading font-bold">
                            {{ $event->start_date->format('j') }}- {{ $event->end_date->format('j F') }}
                        </div>
                    @endif
                    <div class="pt-2">
                        <div class="flex items-center text-dark dark:text-light">
                            <x-heroicon-o-building-office-2 class="size-4 mr-2"/>{{ $event->location }}
                        </div>
                        <div class="flex items-center text-dark dark:text-light">
                            <x-heroicon-o-map-pin class="size-4 mr-2"/>{{ $event->city }}
                        </div>
                    </div>
                </div>
            </div>
        </x-card.default>
    @endforeach
    <div>
        {{ $events->links() }}
    </div>
    <x-slot name="side">
        To be continued
    </x-slot>
</x-app-layout>