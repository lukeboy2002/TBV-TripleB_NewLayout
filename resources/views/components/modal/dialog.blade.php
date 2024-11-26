@props(['id' => null, 'maxWidth' => null])

<x-modal.base :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg font-medium text-dark dark:text-light">
            {{ $title }}
        </div>

        <div class="mt-4 text-sm text-dark dark:text-light">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-end space-x-2 px-6 py-4 bg-light dark:bg-dark text-end">
        {{ $footer }}
    </div>
</x-modal.base>
