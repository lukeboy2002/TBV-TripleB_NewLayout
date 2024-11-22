@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg font-medium text-dark dar:text-light">
            {{ $title }}
        </div>

        <div class="mt-4 text-sm text-dark dar:text-light">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end space-x-2 px-6 py-4 bg-light dar:bg-dark text-end">
        {{ $footer }}
    </div>
</x-modal>
