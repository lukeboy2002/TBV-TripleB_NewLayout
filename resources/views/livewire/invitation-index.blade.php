<div class="p-6">
    @if (!$invitees->isEmpty())
        <div class="flex justify-end items-center space-x-2 text-xs text-dark dark:text-light">
            <x-search-box/>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-left rtl:text-right text-gray-500">
                <thead class="text-dark dark:text-light uppercase text-xs">
                <tr class="border-b border-dark dark:border-light">
                    @include('livewire.sortable-th',[
                         'name' => 'email',
                          'displayName' => 'Email'
                     ])
                    @include('livewire.sortable-th',[
                        'name' => 'invited_by',
                         'displayName' => 'Invited'
                    ])
                    @include('livewire.sortable-th',[
                        'name' => 'invited_date',
                         'displayName' => 'invited date'
                    ])
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($invitees as $invitee)
                    <tr wire:key="{{$invitee->id}}"
                        class="border-b border-dark dark:border-light text-xs text-dark dark:text-light">
                        <td class="px-6 py-4">
                            {{ $invitee->email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ ucfirst($invitee->invited_by) }}
                        </td>
                        <td class="px-6 py-4">
                            @if($invitee->invited_date)
                                {{ $invitee->getInvitationDate() }}
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            @if(isset($invitee->registered_at) == null)
                                @if( ($invitee->invited_by) == auth()->user()->username || auth()->user()->hasRole('admin') )
                                    <x-button.icon class="bg-red-800 p-2"
                                                   wire:click="delete( {{ $invitee->id }})"
                                                   wire:loading.attr="disabled">
                                        <x-heroicon-o-trash class="size-4"/>
                                    </x-button.icon>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="px-4 py-4">
            {{ $invitees->links() }}
        </div>
    @else
        <div class="flex flex-col justify-center items-center h-40 space-y-4">
            <div class="text-primary">
                <x-heroicon-o-x-circle class="size-14"/>
            </div>
            <p class="text-xl font-bold tracking-tight text-dark dark:text-light">No records found</p>
        </div>
    @endif


    <!-- Delete User Confirmation Modal -->
    <x-modal.dialog wire:model.live="confirmingDeletion">
        <x-slot name="title">
            Delete Account
        </x-slot>

        <x-slot name="content">
            Are you sure you want to delete this Invitee?
        </x-slot>

        <x-slot name="footer">
            <x-button.secondary class="px-3 py-2 text-xs font-medium" wire:click="$set('confirmingDeletion', false)"
                                wire:loading.attr="disabled">
                Cancel
            </x-button.secondary>

            <x-button.danger class="px-3 py-2 text-xs font-medium"
                             wire:click="deleteInvitee( {{ $confirmingDeletion }} )" wire:loading.attr="disabled">
                Delete Account
            </x-button.danger>
        </x-slot>
    </x-modal.dialog>
</div>
