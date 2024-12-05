<div>
    <x-heading>Upcoming event</x-heading>
    @foreach($events as $event)
        <a href="{{route('events.show', $event->id)}}">
            @if($event->end_date === null)
                <div class=" text-dark dark:text-light">
                    date: {{ $event->start_date->format('j F')}}
                </div>
            @else
                <div class="text-dark dark:text-light">
                    date: {{ $event->start_date->format('j') }}- {{ $event->end_date->format('j F') }}
                </div>
            @endif
            <div class="text-primary font-bold"><span
                    class="text-dark dark:text-light">Event:</span> {{ $event->title }}
            </div>
        </a>
    @endforeach
</div>
