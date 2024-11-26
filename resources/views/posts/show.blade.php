<x-app-layout title="{{$post->title}}">
    <x-slot name="hero">
        <img src="{{ $post->getImage()  }}"
             alt="{{ $post->title}}"
             class="absolute inset-0 w-full h-124 object-cover"
        />
        <div class="absolute h-124 inset-0 flex flex-col items-center justify-center">
            <h3 class="text-primary font-heading font-semibold tracking-wide md:text-4xl text-center uppercase">
                {{ $post->title }}
            </h3>
        </div>
    </x-slot>
    <article class="bg-light rounded-lg border border-primary shadow-md dark:bg-dark p-4 my-4">
        <header class="mb-2">
            <div class="flex justify-between items-center text-gray-500">
                <x-badge.category
                        wire:navigate
                        href="{{ route('posts.index', ['category' => $post->category->slug]) }}"
                        :Color="$post->category->color">
                    {{ $post->category->name }}
                </x-badge.category>
                <div>
                    <div class="flex space-x-4 uppercase text-dark dark:text-light">
                        <div>BY <span class="text-primary font-semibold">{{ $post->author->username }}</span></div>
                        <div>{{ $post->getFormattedDate() }}</div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end items-center text-xs">
                <div>
                    <livewire:like-component type="post" id="{{ $post->id }}"/>
                </div>
            </div>
        </header>
        <main class="prose prose-sm max-w-none text-dark dark:text-light">
            {!! $post->body !!}
        </main>
        <footer class="flex pt-4">
            @foreach ($post->tags as $tag)
                <x-badge.tag
                        wire:navigate
                        href="{{ route('posts.index', ['tag' => $tag->slug]) }}">
                    {{ $tag->name }}
                </x-badge.tag>
            @endforeach
        </footer>
    </article>

    <div class="pt-6">
        <livewire:comments :post="$post"/>
    </div>
    <x-slot name="side">
        <div class="space-y-10">
            <x-categories/>
            <x-latest-post/>
            <x-tags/>
        </div>
    </x-slot>
</x-app-layout>