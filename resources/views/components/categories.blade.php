<x-heading>Categories</x-heading>
<div class="flex flex-col justify-between space-y-2 ">
    @foreach($categories as $category)
        <div class="flex justify-between mr-20">
            <x-link-primary href="{{ route('posts.index', ['category' => $category->slug]) }}">
                {{$category->name}}
            </x-link-primary>
            <div>
                ({{$category->total}})
            </div>
        </div>
    @endforeach
</div>