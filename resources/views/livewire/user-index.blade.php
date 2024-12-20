<div class="p-6">
    @if (!$users->isEmpty())
        <div class="flex justify-end items-center space-x-2 text-xs text-dark dark:text-light">
            <x-search-box/>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-left rtl:text-right text-gray-500">
                <thead class="text-dark dark:text-light uppercase text-xs">
                <tr class="border-b border-dark dark:border-light">
                    <th></th>
                    @include('livewire.sortable-th',[
                         'name' => 'username',
                          'displayName' => 'Username'
                     ])
                    @include('livewire.sortable-th',[
                         'name' => 'email',
                          'displayName' => 'Email'
                     ])
                    @include('livewire.sortable-th',[
                        'name' => 'invited_by',
                         'displayName' => 'Invited By'
                    ])
                    @include('livewire.sortable-th',[
                        'name' => 'model_id',
                         'displayName' => 'Role'
                    ])
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr wire:key="{{$user->id}}"
                        class="border-b border-dark dark:border-light text-xs text-dark dark:text-light">
                        <td class="px-6 py-4">
                            <img class="h-8 w-8 rounded-full object-cover"
                                 src="{{ $user->profile_photo_url }}"
                                 alt="{{ $user->username }}"
                            />
                        </td>
                        <td class="px-6 py-4">
                            {{ ucfirst($user->username) }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ ucfirst($user->invited_by) }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($user->role_name  === "user")
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">User</span>
                            @endif
                            @if ($user->role_name  === "member")
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Member</span>
                            @endif
                            @if ($user->role_name  === "admin")
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Admin</span>
                            @endif
                        </td>
                        <td class="flex space-x-2 py-4 text-right">
                            @if( ($user->username) == auth()->user()->username || auth()->user()->hasRole('admin') )
                                <x-button.icon class="bg-blue-800 p-2"
                                               wire:click="delete( {{ $user->id }})"
                                               wire:loading.attr="disabled">
                                    <x-heroicon-o-pencil-square class="size-4"/>
                                </x-button.icon>
                            @endif

                            @if( ($user->invited_by) == auth()->user()->username || auth()->user()->hasRole('admin') )
                                <x-button.icon class="bg-red-800 p-2"
                                               wire:click="delete( {{ $user->id }})"
                                               wire:loading.attr="disabled">
                                    <x-heroicon-o-trash class="size-4"/>
                                </x-button.icon>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="px-4 py-4">
            {{ $users->links() }}
        </div>
    @else
        <div class="flex flex-col justify-center items-center h-40 space-y-4">
            <div class="text-primary">
                <x-heroicon-o-x-circle class="size-14"/>
            </div>
            <p class="text-xl font-bold tracking-tight text-dark dark:text-light">No records found</p>
        </div>
    @endif


    {{--    <!-- Delete User Confirmation Modal -->--}}
    {{--    <x-modal.dialog wire:model.live="confirmingDeletion">--}}
    {{--        <x-slot name="title">--}}
    {{--            Delete Account--}}
    {{--        </x-slot>--}}

    {{--        <x-slot name="content">--}}
    {{--            Are you sure you want to delete this Invitee?--}}
    {{--        </x-slot>--}}

    {{--        <x-slot name="footer">--}}
    {{--            <x-button.secondary class="px-3 py-2 text-xs font-medium" wire:click="$set('confirmingDeletion', false)"--}}
    {{--                                wire:loading.attr="disabled">--}}
    {{--                Cancel--}}
    {{--            </x-button.secondary>--}}

    {{--            <x-button.danger class="px-3 py-2 text-xs font-medium"--}}
    {{--                             wire:click="deleteInvitee( {{ $confirmingDeletion }} )" wire:loading.attr="disabled">--}}
    {{--                Delete Account--}}
    {{--            </x-button.danger>--}}
    {{--        </x-slot>--}}
    {{--    </x-modal.dialog>--}}
</div>

