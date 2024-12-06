@props(['for'])

@error($for)
<p {{ $attributes->merge(['class' => 'mt-2 p-2 flex items-center text-sm bg-red-100 rounded-lg border border-red-600 text-red-600']) }}>
    <x-heroicon-o-exclamation-triangle class="size-4 mr-2"/>{{ $message }}
</p>
@enderror
