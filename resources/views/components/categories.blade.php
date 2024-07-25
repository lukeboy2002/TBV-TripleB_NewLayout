<h3 class="mb-8 text-xl font-heading font-bold">Categories </h3>
<div class="flex flex-col justify-between space-y-2 ">
    @foreach($categories as $category)
        <div class="flex justify-between mr-20">
            <x-link-reversed href="{{ route('posts.index', ['category' => $category->slug]) }}">
                {{$category->name}}
            </x-link-reversed>
            <div>
                ({{$category->total}})
            </div>
        </div>
    @endforeach
</div>