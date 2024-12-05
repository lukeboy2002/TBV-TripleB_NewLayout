<div>
    <div class="flex justify-end space-x-4 mb-4">
        <div class="flex items-center space-x-2 text-xs text-dark dark:text-light">
            <x-search-box/>
        </div>
    </div>

    @foreach($this->events as $event)
        <x-card.default class="mb-4">
            <a href="{{ route('events.show', $event->id) }}" class="lg:flex justify-between items-center space-x-6">
                <div class="hidden lg:block lg:w-1/4">
                    <img src="{{$event->getImage() }}" class="rounded-l-lg" alt="{{ $event->title }}"/>
                </div>
                <div class="w-full pt-2 lg:pt-0 lg:w-3/4">
                    @foreach ($event->tags as $tag)
                        <x-badge.tag
                            wire:navigate
                            href="{{ route('events.index', ['tag' => $tag->slug]) }}">
                            {{ $tag->name }}
                        </x-badge.tag>
                    @endforeach
                    <div class="lg:flex justify-between">
                        <div class="w-full pt-2 lg:pt-0 lg:w-2/4">
                            <div class="text-primary text-2xl font-heading font-bold">{{ $event->title }}</div>
                            <div class="text-dark dark:text-light">{{ $event->description}}</div>
                        </div>

                        <div class="py-2 lg:py-0 w-full lg:w-1/4">
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
                </div>
            </a>
        </x-card.default>
    @endforeach
    <div>
        {{ $this->events->links(data: ['scrollTo' => false]) }}
    </div>
</div>



