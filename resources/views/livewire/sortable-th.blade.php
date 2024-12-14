<th scope="col" class="px-6 py-3 " wire:click="setSortBy('{{ $name }}')">
    <button class="flex items-center">
        {{ $displayName }}
        @if ($sortBy !== $name)
            <x-heroicon-o-chevron-up-down class="size-5"/>
        @elseif($sortDir === 'ASC')
            <x-heroicon-o-chevron-up class="size-3 ml-1"/>
        @else
            <x-heroicon-o-chevron-down class="size-3 ml-1"/>
        @endif
    </button>
</th>
