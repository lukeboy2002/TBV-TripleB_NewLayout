<div class="py-6">
    <div class="flex justify-between items-center">
        <div>
            Search
        </div>
        <div class="flex items-center space-x-6">
            @can('create:invitation')
                <x-link.primary href="{{route('invitations.create')}}" class="text-xs">Invite User</x-link.primary>
            @endcan
            @can('create:user')
                <x-link.primary href="{{route('users.create')}}" class=" text-xs">Create Member</x-link.primary>
            @endcan
        </div>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-left rtl:text-right text-gray-500">
            <thead class="text-dark dark:text-light uppercase text-xs">
            <tr class="border-b border-dark dark:border-light">
                @include('livewire.table.sortable-th',[
                        'name' => 'username',
                         'displayName' => 'Username'
                    ])
                @include('livewire.table.sortable-th',[
                     'name' => 'email',
                      'displayName' => 'Email'
                 ])
                @include('livewire.table.sortable-th',[
                    'name' => 'invited_by',
                     'displayName' => 'Invited'
                ])
                @include('livewire.table.sortable-th',[
                    'name' => 'model_id',
                     'displayName' => 'Role'
                ])
                <th scope="col" class="px-4 py-3">Status</th>
                <th scope="col" class="px-4 py-3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr class="border-b border-dark dark:border-light text-xs text-dark dark:text-light">
                    <th scope="row"
                        class="px-4 py-2 font-medium whitespace-nowrap">
                        {{ ucfirst($user->username) }}
                    </th>
                    <td class="px-4 py-2">
                        {{ $user->email }}
                    </td>
                    <td class="px-4 py-2">
                        {{ $user->invited_by }}
                    </td>
                    <td class="px-4 py-2">
                        {{ $user->role_name }}                    </td>
                    <td class="px-4 py-2">

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    Navigatie
</div>
