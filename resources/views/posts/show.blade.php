<x-app-layout title="{{$post->title}}">
    <x-slot name="hero">
        <img src="{{ $post->getImage()  }}"
             alt="{{ $post->title}}"
             class="absolute inset-0 w-full h-124 object-cover"
        />
        <div class="absolute h-124 inset-0 flex flex-col items-center justify-center">
            <h3 class="text-orange-500 font-heading font-semibold tracking-wide md:text-4xl text-center uppercase">
                {{ $post->title }}
            </h3>
        </div>
    </x-slot>
    <article class="bg-gray-50 pt-1 rounded-xl p-4 my-4">
        <header class="mb-2">
            <div class="flex justify-between items-center text-gray-500">
                <div class="flex items-center space-x-4 mt-6">
                    <a href="#" class="bg-red-500 text-white">Categories</a>
                </div>
                <div>
                    <div class="flex space-x-4 uppercase">
                        <div>BY <span class="text-orange-500 font-semibold">{{ $post->author->username }}</span></div>
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
        <main class="prose prose-sm max-w-none">
            {!! $post->body !!}
        </main>
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