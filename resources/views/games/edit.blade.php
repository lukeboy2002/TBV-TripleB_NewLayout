<x-app-layout title="edit game">
    @push('styles')
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet"/>
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
              rel="stylesheet"/>
    @endpush
    <x-slot name="hero">
        <img src="{{ asset("storage/assets/newgame.png") }}"
             alt="Background Image"
             class="absolute inset-0 w-full h-124 object-cover object-bottom"
        />
        <div class="absolute inset-0 flex flex-col items-center justify-center">
            <h3 class="text-primary font-heading font-semibold tracking-wide text-xl md:text-2xl uppercase">
                Create New Game
            </h3>
            <h1 class="text-5xl font-heading font-black tracking-wider uppercase text-white">
                TBV-TripleB
            </h1>
        </div>
    </x-slot>

    <x-card.default>
        <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="grid sm:grid-cols-2 gap-4">
                <div class="relative overflow-x-auto">
                    <div>
                        <table class="w-full text-sm text-left rtl:text-right text-dark dark:text-light">
                            <thead class="text-xs text-dark uppercase bg-light dark:bg-dark dark:text-light">
                            <tr class="bg-light border-b  dark:bg-dark border-dark dark:border-light">
                                <th scope="col" class="px-6 py-3">
                                    Username
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Points
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Winner
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    CUP
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($game->users as $user)
                                <tr class="bg-light border-b  dark:bg-dark border-dark dark:border-light dark:hover:bg-[#232221] hover:bg-gray-300">

                                    <th scope=" row"
                                        class="px-6 py-4 font-medium text-dark whitespace-nowrap dark:text-white">
                                        {{ ucfirst($user->username) }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <input type="hidden" name="users[]" value="{{ $user->id }}">
                                        <x-form.input type="number" name="points[{{ $user->id }}]"
                                                      placeholder="points for {{ $user->username }}" required/>
                                    </td>
                                    <td class="px-6 py-4">
                                        <input type="checkbox"
                                               name="winner_id"
                                               class="w-4 h-4 text-primary bg-light dark:bg-dark border-dark dark:border-light rounded focus:ring-primary focus:ring-2 "
                                               id="winner-{{ $user->id }}"
                                               value="{{ $user->id }}"
                                        >
                                    </td>
                                    <td class="px-6 py-4">
                                        <input type="checkbox"
                                               name="cup_winner_id"
                                               class="w-4 h-4 text-primary bg-light dark:bg-dark border-dark dark:border-light rounded focus:ring-primary focus:ring-2 "
                                               id="cup-winner-{{ $user->id }}"
                                               value="{{ $user->id }}"
                                        >
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="space-y-4">
                    <x-form.label for="image" value="Cup Winner"/>
                    <x-form.input type="file" name="image" id="image"/>
                    <x-form.input-error for="image" class="mt-2"/>
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <x-button.primary type="submit" class="btn btn-primary">Submit Result</x-button.primary>
            </div>
        </form>
    </x-card.default>

    @push('scripts')
        <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

        <script>
            FilePond.registerPlugin(FilePondPluginImagePreview);
            FilePond.registerPlugin(FilePondPluginFileValidateType);

            const inputElement = document.querySelector('#image');

            const pond = FilePond.create(inputElement, {
                acceptedFileTypes: ['image/*'],
                server: {
                    process: '{{ route('filepond.upload') }}',
                    revert: '{{ route('filepond.revert') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            });
        </script>
    @endpush
</x-app-layout>