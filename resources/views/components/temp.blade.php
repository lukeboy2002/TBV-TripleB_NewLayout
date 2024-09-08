<x-app-layout title="{{$post->title}}">


    <div class="flex justify-between items-center text-gray-500 mb-4">
        <div class="flex items-center space-x-4">
            @foreach ($post->tags as $tag)
                <div class="text-orange-500 uppercase font-medium">
                    {{ $tag->name }}

                </div>
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

    <div class="pt-8">
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