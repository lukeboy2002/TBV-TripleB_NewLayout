<th scope="col" class="px-6 py-3 " wire:click="setSortBy('{{ $name }}')">
    <button class="flex items-center">
        {{ $displayName }}
        @if ($sortBy !== $name)
            <x-heroicon-o-chevron-up-down class="ml-2 h-4"/>
        @elseif($sortDir === 'ASC')
            <x-heroicon-o-chevron-up class="ml-2 h-4"/>
        @else
            <x-heroicon-o-chevron-down class="ml-2 h-4"/>
        @endif
    </button>
</th>
