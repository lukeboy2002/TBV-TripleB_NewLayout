<x-app-layout title="{{$post->title}}">
    <x-slot name="hero">
        <img src="{{ asset($post->getImage()) }}"
             alt="{{ $post->title  }}"
             class=" absolute inset-0 w-full h-124 object-cover"
        />
    </x-slot>

    <div class="flex justify-between items-center text-gray-500 mb-4">
        <div class="flex items-center space-x-4">
            @foreach ($post->categories as $category)
                <a href="{{ route('posts.index', ['category' => $category->slug]) }}"
                   class="text-orange-500 uppercase font-medium">
                    {{ $category->title }}
                </a>
            @endforeach
        </div>
        <div>
            <div class="flex space-x-4 uppercase">
                <div>BY <span class="text-orange-500 font-semibold">{{ $post->author->username }}</span></div>
                <div>{{ $post->getFormattedDate() }}</div>
            </div>
        </div>
    </div>
    <x-link-reversed class="text-gray-600 text-5xl font-black tracking-wider leading-tight mb-6">
        {{ $post->title }}
    </x-link-reversed>

    <div class="text-gray-500 leading-7">
        {!! $post->body !!}
    </div>
    <x-slot name="side">
        samdfkjas
    </x-slot>
</x-app-layout>