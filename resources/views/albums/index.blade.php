<x-app-layout title="Gallery">
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 p-4">
        @foreach($albums as $album)
            <div class="relative">
                <a href="{{ route('albums.show', $album->slug)}} ">
                    <img src="{{ $album->getImage() }}"
                         alt="{{ $album->title }}"
                         class="w-full max-h-60 rounded-lg"
                    >
                    <div class="absolute w-full max-h-60 inset-0 flex flex-col items-center justify-center">
                        <h3 class="bg-light bg-opacity-50 px-2 py-1 rounded-lg text-primary font-heading font-semibold tracking-wide md:text-4xl text-center uppercase">
                            {{ $album->title }}
                        </h3>
                    </div>
                    <div class="absolute bg-light bg-opacity-50 w-full text-center bottom-0 px-2 py-1 text-light">
                        {{ $album->description }}
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</x-app-layout>
