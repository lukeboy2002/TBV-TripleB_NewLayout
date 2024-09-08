<h3 class="mb-8 text-xl font-heading font-bold">Tags</h3>
<div class="space-x-2">
    @foreach($tags as $tag)
        <a href="{{ route('posts.index', ['tag' => $tag->slug]) }}"
           class="px-3 py-2 text-xs font-medium text-center text-gray-900 bg-white rounded-lg border border-orange-500
            hover:text-orange-500 focus:outline-none focus:text-orange-500">
            {{$tag->name}}
        </a>
    @endforeach
</div>